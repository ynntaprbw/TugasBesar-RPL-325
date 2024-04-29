<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListBukuController;
use App\Http\Controllers\ListUlasanController;
use App\Http\Controllers\ArtikelController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/beranda', [ListBukuController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('beranda');


Route::middleware(['auth'])->group(function () {
    Route::get('/ulasan', [ListUlasanController::class, 'index'])->name('ulasan');
    Route::post('/ulasan/filter', [ListUlasanController::class, 'filterByRating']);
    Route::post('/ulasan/store', [ListUlasanController::class, 'store']);

    Route::get('/detailBuku/{id}', [ListBukuController::class, 'getById'])->name('detailBuku');


    Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
});


require __DIR__.'/auth.php';

