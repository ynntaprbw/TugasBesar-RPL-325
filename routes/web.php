<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

 
Route::get('/artikel',[PostController::class,'index']);
Route::get('create',[PostController::class,'create']);
Route::post('post',[PostController::class,'store']);
Route::get('show/{id}',[PostController::class,'show']);
Route::get('edit/{id}',[PostController::class,'edit']);
Route::post('update/{id}',[PostController::class,'update']);
Route::get('delete/{id}',[PostController::class,'destroy']);
