<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cowhistory;
use App\Models\cow;
use Illuminate\Support\Facades\Auth;

class RanchdayController extends Controller
{
    //
    public function show()
    {
        $user = Auth::user();

        if ($user->rol === 'admin') {
            $cows = cow::where('status', 1)->orderByRaw('LENGTH(animal_code), animal_code')->get();    
        }
        else {
            $cows = cow::where('cod_user', $user->id)->where('status', 1)->orderByRaw('LENGTH(animal_code), animal_code')->get();
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
}
