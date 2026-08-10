<?php

namespace App\Http\Controllers;

use App\Models\HistorialCaja;
use Illuminate\Http\JsonResponse;

// Se encarga de manejar todos los datos de esta parte en este caso solo de historial de caja.
class HistorialCajaController extends Controller
{
    /**
     * Devuelve todos los registros del historial de caja.
     */
    public function index(): JsonResponse
    {
        // Trae todos los registros de la tabla historial_caja
        $historial = HistorialCaja::all();

        // Responde al frontend con los datos en formato JSON
        return response()->json($historial, 200);
    }
}
