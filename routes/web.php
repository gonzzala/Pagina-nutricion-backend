<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\ProductImageController;
use App\Http\Controllers\Web\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::patch('/products/{product_id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product_id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::post('/product-images/{product_id}', [ProductImageController::class, 'store'])->name('product-images.store');
    Route::delete('/product-images/{productimage_id}', [ProductImageController::class, 'destroy'])->name('product-images.destroy');
    Route::get('/admins', [AdminController::class, 'create'])->name('admins.create');
    Route::post('/admins', [AdminController::class, 'store'])->name('admins.store');
    Route::patch('/admins/{id}', [AdminController::class, 'update'])->name('admins.update');
    Route::delete('/admins/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');
});

require __DIR__ . '/auth.php';
