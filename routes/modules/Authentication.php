<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => '', ], function () {
    Route::get('/', [AuthController::class, 'show'])->name('Auth.show');
    Route::post('/', [AuthController::class, 'login'])->name('Auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('Auth.logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware([RolMiddleware::class . ':admin,propietario'])
    ->name('Auth.dashboard');
});
