<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\GoogleController; 
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdoptionController;


// User routes
Route::get('/', function () {
    return view('cat_food');
});

Route::get('/cat_food', [ProductController::class, 'catFoodPage'])->name('cat.food');

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

// Tharushi's codes loging and others

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Admin dashboard route
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth', 'is_admin');

// User dashboard route
Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->name('user.dashboard')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update'); 
});
// Authentication Routes
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);


Route::get('profile', [AuthenticatedSessionController::class, 'create']) ->name('profile');
Route::post('profile', [RegisteredUserController::class, 'store']);


Route::get('register', [RegisteredUserController::class, 'create']) ->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

// Password Reset Routes
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store']) ->name('password.update');

//google login Route
Route::get('auth/google',[GoogleController::class,'googlepage']);
Route::get('auth/google/callback',[GoogleController::class,'googlecallback']);

// Logout Route
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
     ->name('logout');

     Route::middleware('auth')->group(function () {
        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
    });
require __DIR__.'/auth.php';

// Admin panel  ishari's code
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

// Zahrath's
Route::get('/', [HomeController::class, 'home'])->name('home');
// Admin dashboard for pet management
Route::get('/pets/index', [PetController::class, 'index'])->name('pets.index');
Route::get('/pets/create', [PetController::class, 'create'])->name('pets.create');
Route::post('/pets/store', [PetController::class, 'store'])->name('pets.store');
Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');
Route::put('/pets/{id}', [PetController::class, 'update'])->name('pets.update');
Route::get('/pets/{id}/delete', [PetController::class, 'confirmDelete'])->name('pets.confirmDelete');
Route::delete('/pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy');
// Admin dashboard for pet adoption management
Route::get('/adoption', [PetController::class, 'adoptionpage'])->name('adoptionpage');
Route::get('/adoption/form/{id}', [AdoptionController::class, 'showForm'])->name('adoption.form');
Route::post('/adoption/submit', [AdoptionController::class, 'submitAdoption'])->name('adoption.submit');
Route::get('/pets/indexadoption', [AdoptionController::class, 'indexadoption'])->name('pets.indexadoption');
Route::post('/pets/indexadoption', [AdoptionController::class, 'storeadoption'])->name('pets.storeadoption');
Route::delete('/adoptions/{id}', [AdoptionController::class, 'destroy'])->name('adoptions.destroy');


