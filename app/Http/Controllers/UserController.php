<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function show()
    {
        $users = User::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        $inactiveUsers = User::where('status', 2)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('User.all-user', compact('users', 'inactiveUsers'));
    }

    public function create()
    {
        return view('User.form-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $date = $request->only(['name', 'last_name', 'username', 'email']);
        $date['password'] = Hash::make($request->password);
        $date['status'] = 1;

        User::create($date);
        return redirect(route('User.show'))->with('success', 'Usuario creado con exito');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'last_name' => 'required|string',
            'username' => 'required|string|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $date = $request->only(['name', 'last_name', 'username', 'email']);
        if ($request->filled('password')) {
            $date['password'] = Hash::make($request->password);
        }

        $user->update($date);
        return redirect(route('User.show'))->with('success', 'Usuario actualizado con exito');
    }

    public function switch(User $user)
    {
        $user->status = 2;
        $user->save();
        return redirect(route('User.show'))->with('success', 'Usuario eliminado con exito');
    }
    public function restore(User $user)
    {
        $user->status = 1;
        $user->save();
        return redirect(route('User.show'))->with('success', 'Usuario restaurado con exito');
    }
}
