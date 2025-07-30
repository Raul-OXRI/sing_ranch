<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\cow;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function show(Request $request)
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $valid = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);
        $valid['username'] = strtolower($valid['username']);
        if (Auth::attempt($valid)) {
            $user = Auth::user();
            if ($user->status === 1) {
                return redirect(route('Auth.dashboard'))
                    ->with('success', 'Welcome back')
                    ->with(compact('user'));
            }
            Auth::logout();
            return redirect(route('login'))
                ->with('auth', 'Tu cuenta esta inactiva. Contacta al administrador...');
        }

        return redirect(route('login'))
            ->with(['auth' => 'Credenciales incorrectas. Intente de nuevo...']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('login'))
            ->with('success', 'Has cerrado sesión correctamente.');
    }

    public function dashboard()
    {
        $totalregistro = Cow::count();
        $totalPropietarios = User::where('status', 1)->count();
        $user = Auth::user();
        $vacas = 0;
        $toros = 0;
        $propietariosConVacas = [];

        if ($user->rol === 'admin') {
            $propietariosConVacas = User::where('status', 1)
                ->withCount(['cows as vacas_activas' => function ($query) {
                    $query->where('status', 1)->where('sexo', 'hembra');
                }])
                ->withCount(['cows as toros_activos' => function ($query) {
                    $query->where('status', 1)->where('sexo', 'macho');
                }])
                ->get();
            $cow_total = Cow::where('status', 1)->count();
            $cow_death = Cow::where('status', 2)->count();
            $cow_sold = Cow::where('status', 3)->count();
        } else {
            $vacas = Cow::where('cod_user', $user->id)->where('status', 1)->where('sexo', 'hembra')->count();
            $toros = Cow::where('cod_user', $user->id)->where('status', 1)->where('sexo', 'macho')->count();
            $cow_total = Cow::where('cod_user', $user->id)->where('status', 1)->count();
            $cow_death = Cow::where('cod_user', $user->id)->where('status', 2)->count();
            $cow_sold = Cow::where('cod_user', $user->id)->where('status', 3)->count();
            $totalregistro = Cow::where('cod_user', $user->id)->count();
        }

        return view('dashboard', compact(
            'totalregistro',
            'totalPropietarios',
            'user',
            'vacas',
            'toros',
            'propietariosConVacas',
            'cow_total',
            'cow_death',
            'cow_sold'
        ));
    }
}
