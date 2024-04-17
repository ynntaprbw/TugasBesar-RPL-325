<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.register');
});
Route::post('/register', function () {return view('register');}) -> name('register');
