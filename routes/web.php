<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get ('/inicio', function(){
    return view('inicio');
});