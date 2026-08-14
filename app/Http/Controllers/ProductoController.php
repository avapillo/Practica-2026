<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Muestra la pantalla principal de productos
    public function mostrarProducto()
    {
        $productos = Producto::all();
        return view('interfaz_producto', compact('productos'));
    }

    // Registra el nuevo producto de forma tradicional
    public function registroProducto(Request $request)
    {
        // Validamos de manera clásica
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|integer|min:0',
            'imagen' => 'nullable|image|max:20240', // Hasta 10MB
        ]);

        $imagen = null;

        if ($request->hasFile('imagen')) {
            // Guardamos físicamente en storage/app/public/productos
            $imagen = $request->file('imagen')->store('productos', 'public');
        }

        // Creamos el registro en MySQL
        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'imagen' => $imagen,
        ]);

        // Redireccionamos a la lista, recargando la página con un estado de éxito
        return redirect()->route('producto.index')->with('status', '¡Producto registrado con éxito!');
    }
}
