<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdoptionController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/pets/index', [PetController::class, 'index'])->name('pets.index');

Route::get('/pets/create', [PetController::class, 'create'])->name('pets.create');

Route::post('/pets/index', [PetController::class, 'store'])->name('pets.store');

Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');

Route::put('/pets/{id}', [PetController::class, 'update'])->name('pets.update');

Route::get('/pets/{id}/delete', [PetController::class, 'confirmDelete'])->name('pets.confirmDelete');

Route::delete('/pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy');

Route::get('/adoption', [PetController::class, 'adoptionpage'])->name('adoptionpage');

Route::get('/adoption/form/{id}', [AdoptionController::class, 'showForm'])->name('adoption.form');

Route::post('/adoption/submit', [AdoptionController::class, 'submitAdoption'])->name('adoption.submit');

Route::get('/pets/indexadoption', [AdoptionController::class, 'indexadoption'])->name('pets.indexadoption');

Route::post('/pets/indexadoption', [AdoptionController::class, 'storeadoption'])->name('pets.storeadoption');

Route::delete('/adoptions/{id}', [AdoptionController::class, 'destroy'])->name('adoptions.destroy');
