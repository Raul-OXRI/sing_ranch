<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CowController;
use App\Http\Middleware\AuthenticationMiddleware;
use App\Models\cow;

Route::group(['prefix' => 'Cows'], function () {
    Route::get('/', [CowController::class, 'show'])->name('Cows.show');
    Route::post('/store', [CowController::class, 'store'])->name('Cows.store');
});