<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// 1. Importas tu controlador aquí arriba
use App\Http\Controllers\HistorialCajaController;

// Scoloca todas alas apis que se van a usar

// Esta es la ruta de ejemplo que ya venía en tu archivo (déjala ahí)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// 2. Agregas tu nueva ruta aquí abajo
Route::get('/historial-caja', [HistorialCajaController::class, 'index']);
