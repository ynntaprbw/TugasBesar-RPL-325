<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\PageController; 
use App\Http\Controllers\SessionController; 

// Route::get('/', function () {
//     return view('frontend.register');
// });

Route::get('/', [PageController::class, 'home']);
Route::get('/home', [PageController::class, 'home']);

Route::get('/sesi/register', [SessionController::class, 'register'])->name('sesiRegister');
Route::post('/sesi/create', [SessionController::class, 'create'])->name('register');

Route::get('/sesi', [SessionController::class, 'index'])->name('sesiLogin');
Route::post('/sesi/login', [SessionController::class, 'login'])->name('login');
Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('logout');



