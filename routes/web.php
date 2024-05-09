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

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

