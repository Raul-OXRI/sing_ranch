<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RanchdayController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'Ranchday','middleware' => ['auth', RolMiddleware::class . ':admin,propietario'] ], function () {
    Route::get('/', [RanchdayController::class, 'show'])->name('Ranchday.show');
    Route::post('/store', [RanchdayController::class, 'store'])->name('Ranchday.store');
    Route::get('/xlsx/{id}', [RanchdayController::class, 'xlsxcowhistory'])->name('Ranchday.xlsx');
});