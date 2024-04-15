<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/register', function () {return view('register');}) -> name('register');
Route::get('/', function () {
    return view('welcome');
});
