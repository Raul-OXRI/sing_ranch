<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cowhistory;
use App\Models\cow;

class RanchdayController extends Controller
{
    //
    public function show()
    {
        $cows = cow::where('status', 1)->orderBy('created_at', 'desc')->get();

        return view('RanchDay.all-ranchday', compact('cows'));
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

        Cowhistory::create($data);

        return redirect()->back()->with('success', 'Registro creado exitosamente.');
    }
}
