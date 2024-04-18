<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; 
use App\Http\Controllers\SessionController; 

// Route::get('/', function () {
//     return view('frontend.register');
// });

Route::get('/', [PageController::class, 'home']);
Route::get('/home', [PageController::class, 'home'])->name('home')->middleware('auth');

Route::get('/sesi/register', [SessionController::class, 'register'])->name('sesiRegister');
Route::post('/sesi/create', [SessionController::class, 'create'])->name('register');

Route::get('/sesi', [SessionController::class, 'index'])->name('sesiLogin')->middleware('guest');
Route::post('/login', [SessionController::class, 'login'])->name('login');
Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('logout');
