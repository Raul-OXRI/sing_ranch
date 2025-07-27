<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RanchdayController;

Route::group(['prefix' => 'Ranchday'], function () {
    Route::get('/', [RanchdayController::class, 'show'])->name('Ranchday.show');
    Route::post('/store', [RanchdayController::class, 'store'])->name('Ranchday.store');
});