<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cow;
use App\Models\User;
use Illuminate\Support\Carbon;

class CowController extends Controller
{
    public function show()
    {
        $users = User::select('id', 'name')->where('status', 1)->get();
        $allanimals = collect();
        $cows = cow::where('status', 1)->orderBy('created_at', 'desc')->get();
        $allanimals = $cows->sortByDesc('created_at');
        $allinactive = collect();
        $inactiveCows = cow::where('status', 2)->orderBy('created_at', 'desc')->get();
        $allinactive = $inactiveCows->sortByDesc('created_at');
        $alldead = collect();
        $deadCows = cow::where('status', 3)->orderBy('created_at', 'desc')->get();
        $alldead = $deadCows->sortByDesc('created_at');

        return view('Cows.all-cows', compact('users', 'allanimals', 'allinactive', 'alldead'));
    }

    public function store(Request $request)
    {
        $users = User::all();
        $request->validate([
            'animal_code' => 'required|string',
            'entry_date' => 'nullable|date',
            'sexo' => 'required|string',
            'cod_user' => 'required|exists:users,id',
        ]);

        $date = $request->only(['animal_code', 'entry_date', 'birth_date', 'sexo', 'cod_user']);
        $date['status'] = 1;
        cow::create($date);
        return redirect(route('Cows.show'))->with('success', 'Bovino creado con éxito');
    }

    public function switch(Request $request, $id)
    {
        $cow = cow::find($id);

        $request->validate([
            'status' => 'required|integer|in:1,2,3',
        ]);

        if ($cow) {
            $cow->update(['status' => $request->status]);
            if ($request->status == 3) {
                $cow->update(['death_date' => Carbon::today()]);
            }
            elseif ($request->status == 2) {
                $cow->update(['sold_date' => Carbon::today()]);
            }
        }

        return redirect()->route('Cows.show')->with('success', 'Bovino actualizado con éxito');
    }

    public function storecalving(Request $request)
    {
        $request->validate([
            'animal_code' => 'required|string',
            'birth_date' => 'nullable|date',
            'sexo' => 'required|string',
            'month_code' => 'nullable|string',
            'cod_user' => 'required|exists:users,id',
        ]);

        $date = $request->only(['animal_code', 'birth_date', 'sexo', 'month_code', 'cod_user']);
        $date['status'] = 1;
        cow::create($date);
        return redirect(route('Cows.show'))->with('success', 'Cría creada con éxito');
    }
}
