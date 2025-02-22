<?php

use App\Http\Controllers\AdminTipController;
use App\Http\Controllers\TipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;


Route::get('/', [PageController::class, 'showPawsAndProTips'])->name('paws_pro_tips');
Route::get('/best-sellings', [PageController::class, 'showBestSellings'])->name('best_sellings');


Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    // Admin-only routes
    Route::get('/admin/dashboard', [TipController::class, 'dashboard']);
});

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminTipController::class, 'dashboard']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/tips/store', [TipController::class, 'store']);
});
Route::post('/update-tip', function (Request $request) {
    $tipNumber = $request->input('tip_number');
    $tipText = $request->input('tip_text');

    DB::table('tips')->where('id', $tipNumber)->update(['content' => $tipText]);

    return response()->json(['message' => 'Tip updated successfully']);
});
Route::post('/update-product/{id}', [ProductController::class, 'update'])
    ->middleware(['auth', 'admin']); // Only admins can update

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
