<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminSellingController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PetController as AdminPetController;
use App\Http\Controllers\Admin\AdoptionController as AdminAdoptionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\BestSellingController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\Admin\AdminTipController;
use App\Http\Controllers\Auth\GoogleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/* =========================
   Home / Shop
========================= */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/shop.index', [ShopController::class, 'index'])->name('shop.index');

/* =========================
   Authentication
========================= */
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/shop');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.'
    ]);
});

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
/* =========================
   Cart & Orders (User)
========================= */
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{cart?}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{cart?}', [CartController::class, 'remove'])->name('cart.remove');

Route::post('/order/confirm', [OrderController::class, 'confirm'])->name('order.confirm');
Route::get('/orders', [OrderController::class, 'userOrders'])->name('orders.user');

/* =========================
   Public Adoption
========================= */
Route::get('/adoption', [AdoptionController::class, 'adoptionPage'])->name('adoption.page');
Route::get('/adoption/form/{id}', [AdoptionController::class, 'showForm'])->name('adoption.form');
Route::post('/adoption/submit', [AdoptionController::class, 'submit'])->name('adoption.submit');

/* =========================
   Admin Panel
========================= */
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    /* Products */
    Route::resource('products', ProductController::class);

    /* Orders */
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('orders/{order}/confirm', [OrderController::class, 'adminConfirm'])->name('orders.confirm');
    Route::post('orders/{order}/cancel', [OrderController::class, 'adminCancel'])->name('orders.cancel');
    Route::delete('orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

    /* Pets */
    Route::get('pets', [AdminPetController::class, 'index'])->name('pets.index');
    Route::get('pets/create', [AdminPetController::class, 'create'])->name('pets.create');
    Route::post('pets', [AdminPetController::class, 'store'])->name('pets.store');
    Route::get('pets/{id}/edit', [AdminPetController::class, 'edit'])->name('pets.edit');
    Route::put('pets/{id}', [AdminPetController::class, 'update'])->name('pets.update');
    Route::delete('pets/{id}', [AdminPetController::class, 'destroy'])->name('pets.destroy');

    /* Adoptions */
    Route::get('adoptions', [AdminAdoptionController::class, 'indexadoption'])->name('adoptions.indexadoption');
    Route::delete('adoptions/{id}', [AdminAdoptionController::class, 'destroy'])->name('adoptions.destroy');

   
    

    /* Best Selling */

    Route::get('selling', [AdminSellingController::class, 'index'])->name('selling.index');
    Route::get('selling/create', [AdminSellingController::class, 'create'])->name('selling.create');
    Route::post('selling', [AdminSellingController::class, 'store'])->name('selling.store');
    Route::get('selling/{id}/edit', [AdminSellingController::class, 'edit'])->name('selling.edit');
    Route::put('selling/{id}', [AdminSellingController::class, 'update'])->name('selling.update');
    Route::delete('selling/{id}', [AdminSellingController::class, 'destroy'])->name('selling.destroy');


    //  Tips
    /* Pet Tips */

    Route::get('tips', [AdminTipController::class, 'index'])->name('tips.index');
    Route::get('tips/create', [AdminTipController::class, 'create'])->name('tips.create');
    Route::post('tips', [AdminTipController::class, 'store'])->name('tips.store');
    Route::get('tips/{id}/edit', [AdminTipController::class, 'edit'])->name('tips.edit');
    Route::put('tips/{id}', [AdminTipController::class, 'update'])->name('tips.update');
    Route::delete('tips/{id}', [AdminTipController::class, 'destroy'])->name('tips.destroy');
    

});

/* =========================
   Users
========================= */
Route::get('/users', function () {
    $users = \App\Models\User::all();
    return view('users.index', compact('users'));
})->name('users.index');


/* =========================
   Selling
========================= */
Route::get('/selling', [BestSellingController::class, 'index'])
    ->name('selling.page');
//Route::get('/selling', [BestSellingController::class, 'sellingPage']);



/* =========================
         Tips
========================= */
 //Route::get('/tips', [TipController::class, 'index'])->name('tips.page');

Route::get('/tips', [TipController::class, 'index'])->name('tips.index');


   