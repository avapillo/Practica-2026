<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

// Ruta principal que apunta a home.blade.php
Route::get('/', function () {
    return view('home');
})->name('home');


// Pantalla principal del catálogo
Route::get('/Producto', [ProductoController::class, 'mostrarProducto'])->name('producto.index');

// Ruta web para procesar el formulario tradicional
Route::post('/Producto/guardar', [ProductoController::class, 'registroProducto'])->name('producto.store');
