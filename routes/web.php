<?php

use Illuminate\Support\Facades\Route;

// Ruta principal que apunta a home.blade.php
Route::get('/Inicio', function () {
    return view('home');
})->name('home');

// Rutas nombradas para que los botones de la barra lateral no den error
Route::get('/Platos', function () {
    return view('interfaz_platos');
})->name('interfaz_platos');
