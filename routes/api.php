<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 1. IMPORTANTE: Importa tu ProductoController aquí arriba junto al de Caja
use App\Http\Controllers\HistorialCajaController;
use App\Http\Controllers\ProductoController;

// Ruta que ya tenías
Route::get('/historial-caja', [HistorialCajaController::class, 'index']);
/*
Route::get('/historial-caja', function () {
    // Retornamos un arreglo ficticio para probar que el HTML y JS dibujen la tabla
    return response()->json([
        [
            'momento_cierre' => '2026-08-19 21:00:00',
            'monto_total' => 150000
        ],
        [
            'momento_cierre' => '2026-08-18 20:30:00',
            'monto_total' => 98500
        ]
    ]);
});
*/
// 2. AGREGA ESTA RUTA: Es la que procesará el formulario con JavaScript (POST)
Route::post('/registro-producto', [ProductoController::class, 'registroProducto']);
