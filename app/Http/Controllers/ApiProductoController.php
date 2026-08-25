<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ApiProductoController extends Controller
{
    public function obtenerTodoLosProductos(){

    // Revisar la tabla de producto
        $productos = Producto::with('categoria')->get();

        return response()->json([
            'exito' => true,
            'total' => $productos->count(),
            'data' => $productos
        ], 200);
    }


  public function obtenerProductoPorCategoria($id_categoria)
{
    // 1. Buscamos los productos usando el modelo en SINGULAR (Producto)
    $productos = Producto::with('categoria')
        ->where('fk_id_categoria', $id_categoria)
        ->get();

    // 2. Retornamos la respuesta JSON estructurada
    return response()->json([
        'exito'        => true,
        'id_categoria' => $id_categoria,
        'total'        => $productos->count(),
        'data'         => $productos
    ], 200);
}
}
