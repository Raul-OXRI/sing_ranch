<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CowController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'Cows', 'middleware' => ['auth', RolMiddleware::class . ':admin,propietario']], function () {
    Route::get('/', [CowController::class, 'show'])->name('Cows.show');
    Route::post('/store', [CowController::class, 'store'])->name('Cows.store');
    Route::put('/{cow}/switch', [CowController::class, 'switch'])->name('Cows.switch');
    Route::post('/calving', [CowController::class, 'storecalving'])->name('Cows.storecalving');
    Route::get('/cows/{id}', [CowController::class, 'history'])->name('Cows.info');
    Route::get('/xlsx/{status}', [CowController::class, 'xlxsCow'])->name('Cows.xlsx');
});