<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controL;

Route::get('/', [controL::class, 'index'])->name('controlL.index');
Route::post('/controlL', [controL::class, 'store'])->name('controlL.store');

Route::get('/inicioL', [controL::class, 'index']);

/*
Route::get('/', function () {
    return view('inicioL');
    return view('inicioN');
    return view('welcome');
});*/
/*
Route::get('/inicioL', function () {
    return view('inicioL');
});*/

