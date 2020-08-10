<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('front.welcome');
});

Route::get('/sitio', function () {
    return view('welcome');
});