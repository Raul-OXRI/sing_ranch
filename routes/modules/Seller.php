<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Middleware\RolMiddleware;

Route::group(['prefix' => 'Seller', 'middleware' => ['auth', RolMiddleware::class . ':admin']], function () {
    Route::get('/', [SellerController::class, 'show'])->name('Seller.show');
    Route::post('/store', [SellerController::class, 'store'])->name('Seller.store');
    Route::put('/unitprice/{id}', [SellerController::class, 'unitPrice'])->name('Seller.unitprice');
    Route::put('/bysight/{id}', [SellerController::class, 'bySight'])->name('Seller.bysight');
});
