<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 1. IMPORTANTE: Importa tu ProductoController aquí arriba junto al de Caja
use App\Http\Controllers\HistorialCajaController;
use App\Http\Controllers\ProductoController;

// Ruta que ya tenías
Route::get('/historial-caja', [HistorialCajaController::class, 'index']);

// 2. AGREGA ESTA RUTA: Es la que procesará el formulario con JavaScript (POST)
Route::post('/registro-producto', [ProductoController::class, 'registroProducto']);
