<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListBukuController;
use App\Http\Controllers\ListUlasanController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/beranda', [ListBukuController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('beranda');

Route::get('/buku/search', 'ListBukuController@search')->name('buku.search');



Route::middleware(['auth'])->group(function () {
    Route::get('/ulasan', [ListUlasanController::class, 'index']);
    Route::post('/ulasan/filter', [ListUlasanController::class, 'filterByRating']);
    Route::post('/ulasan/store', [ListUlasanController::class, 'store']);
});


require __DIR__.'/auth.php';

