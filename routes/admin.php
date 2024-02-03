<?php

use App\Http\Controllers\BoletaController;
use App\Http\Controllers\EnvioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name('dashboard');
Route::resource('envios', EnvioController::class);
Route::resource('boletas', BoletaController::class);
