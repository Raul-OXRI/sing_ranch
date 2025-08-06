<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cow;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CowsExport;

class CowController extends Controller
{
    public function show()
    {
        $users = User::select('id', 'name', 'last_name')->where('status', 1)->get();
        $user = Auth::user();
        if ($user->rol === 'admin') {
            $all_active = Cow::with('user')
                ->where('status', 1)
                ->orderByRaw('LENGTH(animal_code), animal_code')
                ->get()
                ->map(function ($cow) {
                    $cow->historyDetails = Cow::getLatestHistoryDetails($cow->id);
                    return $cow;
                });
            $all_dead = Cow::with('user')
                ->where('status', 2)
                ->orderByRaw('LENGTH(animal_code), animal_code')
                ->get()
                ->map(function ($cow) {
                    $cow->historyDetails = Cow::getLatestHistoryDetails($cow->id);
                    return $cow;
                });
            $all_inactive = Cow::with('user')
                ->where('status', 3)
                ->orderByRaw('LENGTH(animal_code), animal_code')
                ->get()
                ->map(function ($cow) {
                    $cow->historyDetails = Cow::getLatestHistoryDetails($cow->id);
                    return $cow;
                });
        } else {
            $all_active = Cow::with('user')
                ->where('status', 1)
                ->where('cod_user', $user->id)
                ->orderByRaw('LENGTH(animal_code), animal_code')
                ->get()
                ->map(function ($cow) {
                    $cow->historyDetails = Cow::getLatestHistoryDetails($cow->id);
                    return $cow;
                });
            $all_dead = Cow::with('user')
                ->where('status', 2)
                ->where('cod_user', $user->id)
                ->orderByRaw('LENGTH(animal_code), animal_code')
                ->get()
                ->map(function ($cow) {
                    $cow->historyDetails = Cow::getLatestHistoryDetails($cow->id);
                    return $cow;
                });
            $all_inactive = Cow::with('user')
                ->where('status', 3)
                ->where('cod_user', $user->id)
                ->orderByRaw('LENGTH(animal_code), animal_code')
                ->get()
                ->map(function ($cow) {
                    $cow->historyDetails = Cow::getLatestHistoryDetails($cow->id);
                    return $cow;
                });
        }
        return view('Cows.all-cows', compact('users', 'all_active', 'all_inactive', 'all_dead', 'user'));
    }

    public function store(Request $request)
    {
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
                $cow->update(['sold_date' => Carbon::date()]);
            } elseif ($request->status == 2) {
                $cow->update(['death_date' => Carbon::date()]);
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

    public function history($id)
    {
        $cow = Cow::findOrFail($id);
        $historyDetails = Cow::getLatestHistoryDetails($id);
        return view('Cows.info', compact('cow', 'historyDetails'));
    }

    public function xlxsCow($status)
    {
        $fileName = match ((int) $status) {
            1 => 'bovinos_activos.xlsx',
            2 => 'bovinos_vendidos.xlsx',
            3 => 'bovinos_muertos.xlsx',
            default => 'bovinos.xlsx',
        };

        return Excel::download(new CowsExport($status), $fileName);
    }
}
