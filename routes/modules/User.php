<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthenticationMiddleware;
use App\Models\User;

Route::group(['prefix' => 'User'], function () {
    Route::get('/', [UserController::class, 'show'])->name('User.show');
    Route::get('/create', [UserController::class, 'create'])->name('User.create');
    Route::post('/store', [UserController::class, 'store'])->name('User.store');
});
