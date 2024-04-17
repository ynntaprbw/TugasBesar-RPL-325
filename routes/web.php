<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController; 

Route::get('/', function () {
    return view('frontend.register');
});
// Route::post('/register', function () {return view('register');}) -> name('register');
Route::post('/register', [registerController::class, 'register'])->name('register');

