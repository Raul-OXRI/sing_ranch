<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CowController;
use App\Http\Middleware\AuthenticationMiddleware;
use App\Models\cow;

Route::group(['prefix' => 'Cows'], function () {
    Route::get('/', [CowController::class, 'show'])->name('Cows.show');
    Route::post('/store', [CowController::class, 'store'])->name('Cows.store');
    Route::put('/{cow}/switch', [CowController::class, 'switch'])->name('Cows.switch');
    Route::post('/calving', [CowController::class, 'storecalving'])->name('Cows.storecalving');
    Route::get('/info/{id}', [CowController::class, 'info'])->name('Cows.info');
});