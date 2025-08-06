<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'User', 'middleware' => ['auth', RolMiddleware::class . ':admin']], function () {
    Route::get('/', [UserController::class, 'show'])->name('User.show');
    Route::get('/create', [UserController::class, 'create'])->name('User.create');
    Route::post('/store', [UserController::class, 'store'])->name('User.store');
    Route::put('/edit/{user}', [UserController::class, 'update'])->name('User.update');
    Route::put('/delete/{user}', [UserController::class, 'switch'])->name('User.switch');
    Route::put('/restore/{user}', [UserController::class, 'restore'])->name('User.restore');
    Route::get('/xlsx', [UserController::class, 'xlsxUser'])->name('User.xlsx');
});
