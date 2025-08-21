<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cowhistory;
use App\Models\cow;
use App\Exports\CowhistoryExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class RanchdayController extends Controller
{
    //
    public function show()
    {
        $user = Auth::user();

        if ($user->rol === 'admin') {
            $cows =  cow::with(['cowhistories' => function ($query) {
                $query->whereNotNull('weight')->orderBy('weight_date', 'desc');
            }])
                ->where('status', 1)
                ->orderByRaw('LENGTH(animal_code), animal_code')
                ->get();
        } else {
            $cows = cow::with(['cowhistories' => function ($query) {
                $query->whereNotNull('weight')->orderBy('weight_date', 'desc');
            }])
                ->where('cod_user', $user->id)
                ->where('status', 1)
                ->orderByRaw('LENGTH(animal_code), animal_code')
                ->get();
        }

        foreach ($cows as $cow) {
            $weights = $cow->cowhistories()
                ->whereNotNull('int_weight')
                ->orderBy('weight_date', 'desc')
                ->limit(2)
                ->pluck('int_weight');

            $lastWeight = $weights[0] ?? null;
            $previousWeight = $weights[1] ?? null;

            if ($lastWeight && $previousWeight) {
                $cow->weight_status = $lastWeight > $previousWeight ? 'up' : ($lastWeight < $previousWeight ? 'down' : 'equal');
            } elseif ($lastWeight) {
                $cow->weight_status = 'only_one';
            } else {
                $cow->weight_status = 'none';
            }

            $cow->last_weight = $lastWeight;
        }

        return view('RanchDay.all-ranchday', compact('cows', 'user'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'weight' => 'nullable|numeric',
            'weight_date' => 'nullable|date',
            'int_weight' => 'nullable|numeric',
            'vaccine' => 'nullable|boolean',
            'vaccine_date' => 'nullable|date',
            'deworming' => 'nullable|boolean',
            'deworming_date' => 'nullable|date',
            'health_check' => 'nullable|boolean',
            'health_check_date' => 'nullable|date',
            'feel' => 'nullable|boolean',
            'feel_date' => 'nullable|date',
            'antirabies' => 'nullable|boolean',
            'antirabies_date' => 'nullable|date',
            'steroids' => 'nullable|boolean',
            'steroids_date' => 'nullable|date',
            'antibiotics' => 'nullable|boolean',
            'antibiotics_date' => 'nullable|date',
            'vitamins' => 'nullable|boolean',
            'vitamins_date' => 'nullable|date',
            'serum' => 'nullable|boolean',
            'serum_date' => 'nullable|date',
            'notes' => 'nullable|string|max:1000',
            'cow_id' => 'required|exists:cows,id',
        ]);

        $boolean = [
            'weight',
            'vaccine',
            'deworming',
            'health_check',
            'feel',
            'antirabies',
            'steroids',
            'antibiotics',
            'vitamins',
            'serum'
        ];

        $atLeastOne = false;
        foreach ($boolean as $field) {
            if (isset($data[$field]) && $data[$field]) {
                $atLeastOne = true;
                break;
            }
        }

        if (!$atLeastOne) {
            return redirect()->back()->withErrors(['Error' => 'Debe seleccionar al menos un campo de salud.']);
        }

        Cowhistory::create($data);

        return redirect()->back()->with('success', 'Registro creado exitosamente.');
    }

    public function xlsxcowhistory($id)
    {
        return Excel::download(new CowhistoryExport($id), 'historial_ganado.xlsx');
    }

    public function pdfcowhistory($id)
    {
        $cow = cow::with(['cowhistories' => function ($query) {
            $query->where('weight', 1)
                ->whereNotNull('int_weight')
                ->orderBy('weight_date', 'asc');
        }])->findOrFail($id);

        $dates = $cow->cowhistories->pluck('weight_date')->toArray();
        $weights = $cow->cowhistories->pluck('int_weight')->toArray();

        $chartUrl = "https://quickchart.io/chart?c=" . urlencode(json_encode([
            "type" => "line",
            "data" => [
                "labels" => $dates,
                "datasets" => [[
                    "label" => "Peso (Lb)",
                    "data" => $weights,
                    "borderColor" => "rgba(9, 136, 119, 1)",
                    "fill" => false
                ]]
            ],
            "options" => [
                "scales" => [
                    "y" => [
                        "ticks" => [
                            "stepSize" => 500  // 👈 controla el salto de los números
                        ]
                    ]
                ]
            ]

        ]));

        $pdf = Pdf::loadView('RanchDay.from-pdf', compact('cow', 'chartUrl'))
            ->setOptions(['isRemoteEnabled' => true]);

        return $pdf->download("PesajeBovino{$cow->animal_code}.pdf");
    }
}
