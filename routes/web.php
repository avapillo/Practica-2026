<?php

use Illuminate\Support\Facades\Route;

// Ruta principal que apunta a home.blade.php
Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas nombradas para que los botones de la barra lateral no den error
Route::get('/platos', function () {
    return view('platos');
})->name('platos');
