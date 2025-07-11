<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cow;
use App\Models\User;
use App\Models\Calves;

class CowController extends Controller
{
    public function show()
    {
        $users = User::select('id', 'name')->where('status', 1)->get();

        $allanimals = collect();
        $cows = cow::where('status', 1)->orderBy('created_at', 'desc')->get();
        $calves = Calves::where('status', 1)->orderBy('created_at', 'desc')->get();
        $allanimals = $cows->merge($calves)->sortByDesc('created_at');

        $allinactive = collect();
        $inactiveCows = cow::where('status', 2)->orderBy('created_at', 'desc')->get();
        $inactiveCalves = Calves::where('status', 2)->orderBy('created_at', 'desc')->get();
        $allinactive = $inactiveCows->merge($inactiveCalves)->sortByDesc('created_at');

        $alldead = collect();
        $deadCows = cow::where('status', 3)->orderBy('created_at', 'desc')->get();
        $deadCalves = Calves::where('status', 3)->orderBy('created_at', 'desc')->get();
        $alldead = $deadCows->merge($deadCalves)->sortByDesc('created_at');

        return view('Cows.all-cows', compact('users', 'allanimals', 'allinactive', 'alldead'));
    }

    public function store(Request $request)
    {
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

    public function switch(Request $request, $id)
    {
        $cow = cow::find($id);
        $calves = Calves::find($id);

        $request->validate([
            'status' => 'required|integer|in:1,2,3',
        ]);

        if ($cow) $cow->update(['status' => $request->status]);
        if ($calves) $calves->update(['status' => $request->status]);

        return redirect()->route('Cows.show')->with('success', 'Bovino actualizado con éxito');
    }

    public function storecalving(Request $request)
    {
        $request->validate([
            'animal_code' => 'required|string',
            'birth_date' => 'nullable|date',
            'sexo' => 'required|string',
            'cod_user' => 'required|exists:users,id',
            'cod_cow' => 'required|exists:cows,id',
        ]);

        $date = $request->only(['animal_code', 'birth_date', 'sexo', 'cod_user', 'cod_cow']);
        $date['status'] = 1;
        Calves::create($date);
        return redirect(route('Cows.show'))->with('success', 'Cría creada con exito');
    }
}
