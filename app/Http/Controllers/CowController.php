<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cow;
use App\Models\User;

class CowController extends Controller
{
    public function show (){
        $users = User::select('id', 'name')->get();

        return view('Cows.all-cows', compact('users'));
    }

    public function store(Request $request){
        $users = User::all();
        $request->validate([
            'animal_code' => 'required|string',
            'entry_date' => 'required|date',
            'birth_date' => 'required|date',
            'sexo' => 'required|string',
            'cod_user' => 'required|exists:users,id',
        ]);

        $date = $request->only(['animal_code', 'entry_date', 'birth_date', 'sexo', 'cod_user']);
        $date['status'] = 1;
        Cow::create($date);
        return redirect(route('Cows.show'))->with('success', 'Bovino creado con exito');
    }

}
