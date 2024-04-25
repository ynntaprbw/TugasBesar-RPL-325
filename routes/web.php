<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/beranda', function () {
    return view('user.beranda');
})->middleware(['auth', 'verified'])->name('beranda');

require __DIR__.'/auth.php';

