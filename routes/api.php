<?php

use App\Http\Controllers\Api\CartApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\PaymentApiController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Support\Facades\Route;


Route::get('/products', [ProductApiController::class, 'index']);
Route::get('/products/{product_id}', [ProductApiController::class, 'show']);
Route::post('/carts', [CartApiController::class, 'store']);
Route::post('/orders', [OrderApiController::class, 'store'])->middleware('limit.orders');
Route::post('/mercadopago-notification', [PaymentApiController::class, 'notification']);