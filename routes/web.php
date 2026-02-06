<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home / Shop page route (shop is the homepage)
Route::get('/', function () {return view('welcome');});
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop.index', [ShopController::class, 'index'])->name('shop.index');

// Simple authentication routes (lightweight)
Route::get('/login', function () {return view('auth.login');
})->name('login');

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/admin/products/index', function () {

    if (Auth::user()->role !== 'admin') {
        abort(403);
    }return view('admin.products.index');
})->middleware('auth')->name('admin.products.index');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/shop');
    }
    return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
});

// User Cart Routes (public — guests allowed)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{cart?}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{cart?}', [CartController::class, 'remove'])->name('cart.remove');

// Order routes (public for guest checkout)
Route::post('/order/confirm', [OrderController::class, 'confirm'])->name('order.confirm');
Route::get('/orders', [OrderController::class, 'userOrders'])->name('orders.user');

// Admin Product & Order Management
Route::prefix('admin')->name('admin.')->group(function () {
    // Product routes
    Route::resource('products', ProductController::class);

    // Order routes
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('orders/{order}/confirm', [OrderController::class, 'adminConfirm'])->name('orders.confirm');
    Route::post('orders/{order}/cancel', [OrderController::class, 'adminCancel'])->name('orders.cancel');
    Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
});

// Public users page (no auth required)
Route::get('/users', function () {
    $users = \App\Models\User::all();
    return view('users.index', ['users' => $users]);
})->name('users.index');
