<?php

namespace App\Http\Controllers;

use App\Models\Producto; // Importación correcta de tu modelo
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // 1. Muestra la pantalla principal de productos
    public function mostrarProducto()
    {
        $productos = Producto::all();
        return view('interfaz_producto', compact('productos'));
    } // <-- Esta llave cierra mostrarProducto

    // 2. Registra el nuevo producto desde el modal
    public function registroProducto(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|integer|min:0',
            'imagen' => 'nullable|image|max:10240',
        ]);

        $imagenPath = null;

        if ($request->hasFile('imagen')) {
            $fila = $request->file('imagen');
            $imagenPath = $fila->store('productos', 'public');
        }

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'imagen' => $imagenPath,
        ]);

        return response()->json([
            'mensaje'   => '¡Producto registrado con éxito!',
            'product'   => $producto,
            'image_url' => $producto->imagen ? asset('storage/' . $producto->imagen) : null
        ], 201);
    } // <-- Esta llave cierra registroProducto

} // <-- Esta llave cierra la CLASE entera del controlador
