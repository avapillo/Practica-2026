<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

// Ruta principal que apunta a home.blade.php
Route::get('/', function () {
    return view('home');
})->name('home');


// Ruta para mostrar el formulario de registro de productos
// Pantalla principal del catálogo
Route::get('/Producto', [ProductoController::class, 'mostrarProducto'])->name('producto.index');
// Llama al metodo de registro producto en ProductoController.php
Route::post('/Producto/guardar', [ProductoController::class, 'registroProducto'])->name('producto.store');

Route::post('/Producto/modificar', [ProductoController::class, 'modificarProducto'])->name('producto.update');

Route::delete('/Producto/{id}/eliminar', [ProductoController::class, 'eliminarProducto'])->name('producto.destroy');
