<?php

use Illuminate\Support\Facades\Route;

// Ruta principal que apunta a home.blade.php
Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas nombradas para que los botones de la barra lateral no den error
/*
Route::get('/Producto', function () {
    return view('interfaz_producto');
})->name('interfaz_producto');
*/

//  SOLUCIÓN EN routes/web.php
use App\Http\Controllers\ProductoController;

Route::get('/Producto', [ProductoController::class, 'mostrarProducto'])->name('producto.index');

