<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Container\Attributes\Auth;

Route::group(['prefix' => 'auth'], function () {
    Route::get('/', [AuthController::class, 'show'])->name('Auth.show');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});

