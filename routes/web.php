<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home / Shop page route (shop is the homepage)
Route::get('/', [ShopController::class, 'index'])->name('shop');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

// Simple authentication routes (lightweight)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/admin');
    }
    return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Simple admin landing (redirect to products index)
Route::get('/admin', function () {
    return redirect()->route('admin.products.index');
})->name('admin');

// User Cart Routes (require auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');

    // Order routes (user)
    Route::post('/order/confirm', [OrderController::class, 'confirm'])->name('order.confirm');
    Route::get('/orders', [OrderController::class, 'userOrders'])->name('orders.user');

    
});

// Admin Product & Order Management
Route::prefix('admin')->name('admin.')->group(function () {
    // Product routes
    Route::resource('products', ProductController::class);

    // Order routes
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('orders/{order}/confirm', [OrderController::class, 'adminConfirm'])->name('orders.confirm');
    Route::post('orders/{order}/cancel', [OrderController::class, 'adminCancel'])->name('orders.cancel');
});

// Public users page (no auth required)
Route::get('/users', function () {
    $users = \App\Models\User::all();
    return view('users.index', ['users' => $users]);
})->name('users.index');
