<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListBukuController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [ListBukuController::class, 'create']);


require __DIR__.'/auth.php';

