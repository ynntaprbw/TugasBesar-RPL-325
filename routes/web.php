<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListBukuController;
use App\Http\Controllers\ListUlasanController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ListBukuController::class, 'create']);

Route::get('/ulasan', [ListUlasanController::class, 'index']);
Route::post('/ulasan/filter', [ListUlasanController::class, 'filterByRating']);
Route::post('/ulasan/store', [ListUlasanController::class, 'store']);


require __DIR__.'/auth.php';

