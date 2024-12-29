<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('cat_food');
   
});

Route::get('/dog_food', function () {
    return view('dog_food');
   
});

Route::get('/Cat_Accessories', function () {
    return view('Cat_Accessories');
   
});

Route::get('/Dog_Accessories', function () {
    return view('Dog_Accessories');
   
});

Route::get('/cart', function () {
    return view('cart');
   
});


// Admin panell 

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::prefix('admin')->middleware('auth', 'admin')->group(function () {
    // Product routes
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // Cart routes
    Route::get('/cart', [CartController::class, 'index'])->name('admin.cart.index');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('admin.cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('admin.cart.destroy');
});



