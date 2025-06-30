<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        if (Auth::attempt($valid)) {
            $user = Auth::user();
            if ($user->status === 1) {
                return redirect(route('dashboard'))
                    ->with('success', 'Welcome back')
                    ->with(compact('user'));
            }
            Auth::logout();
            return redirect(route('login'))
                ->with('auth', 'Tu cuenta esta inactiva. Contacta al administrador...');
        }

        return redirect('login')
            ->with(['auth' => 'Credenciales incorrectas. Intente de nuevo...']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
