<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cow;
use App\Models\User;

class CowController extends Controller
{
    public function show (){
        $users = User::select('id', 'name')->get();
        $cows = cow::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        $inactiveCows = cow::where('status', 2)
            ->orderBy('created_at', 'desc')
            ->get();
        $deadCows = cow::where('status', 3)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Cows.all-cows', compact('users', 'cows', 'inactiveCows', 'deadCows'));
    }

    public function store(Request $request){
        $users = User::all();
        $request->validate([
            'animal_code' => 'required|string',
            'entry_date' => 'nullable|date',
            'birth_date' => 'nullable|date',
            'sexo' => 'required|string',
            'cod_user' => 'required|exists:users,id',
        ]);

        $date = $request->only(['animal_code', 'entry_date', 'birth_date', 'sexo', 'cod_user']);
        $date['status'] = 1;
        cow::create($date);
        return redirect(route('Cows.show'))->with('success', 'Bovino creado con exito');
    }
    public function switch(cow $cow, Request $request){
        $request->validate([
            'status' => 'required|integer|in:1,2,3',
        ]);

        $cow->update(['status' => $request->status]);
        return redirect(route('Cows.show'))->with('success', 'Bovino actualizado con exito');
    }

}
