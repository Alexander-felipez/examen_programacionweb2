<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicioL');
    return view('inicioN');
    return view('welcome');
});

Route::get('/inicioL', function () {
    return view('inicioL');
});

