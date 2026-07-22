<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controL;
use App\Http\Controllers\InicioJController;
use App\Http\Controllers\ClienteController;

Route::get('/', [controL::class, 'index'])->name('controlL.index');
Route::post('/controlL', [controL::class, 'store'])->name('controlL.store');

Route::get('/inicioL', [controL::class, 'index']);

Route::get('/inicioJ', [InicioJController::class, 'index'])->name('inicioJ.index');
Route::post('/inicioJ', [InicioJController::class, 'store'])->name('inicioJ.store');

Route::get('/inicioB', function () {
    return view('inicioB');
})->name('inicioB');

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

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
