<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Middleware\AuthenticationMiddleware;

Route::group(['prefix' => ''], function () {
    Route::get('/', [AuthController::class, 'show'])->name('Auth.show');
    Route::post('/', [AuthController::class, 'login'])->name('Auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('Auth.logout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', AuthenticationMiddleware::class . ''])->name('Auth.dashboard');
});
