<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function mostrarProducto()
    {
        $productos = Producto::all();
        return view('interfaz_producto', compact('productos'));
    }

    public function registroProducto(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|integer|min:0',
            'imagen' => 'nullable|image|max:20240',
        ]);

        $imagen = null;
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen')->store('productos', 'public');
        }

        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'imagen' => $imagen,
        ]);

        return redirect()->route('producto.index')->with('status', '¡Producto registrado con éxito!');
    }

    // NUEVO: Modificar producto existente
    public function modificarProducto(Request $request)
    {
        $request->validate([
            'id'     => 'required|exists:productos,id',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|integer|min:0',
            'imagen' => 'nullable|image|max:20240',
        ]);

        $producto = Producto::findOrFail($request->id);

        if ($request->hasFile('imagen')) {
            // Borramos la foto anterior para no llenar el disco de basura
            if ($producto->imagen) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $producto->imagen = $request->file('imagen')->store('productos', 'public');
        }

        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->save();

        return redirect()->route('producto.index')->with('status', '¡Producto modificado con éxito!');
    }

    // Eliminar producto
    public function eliminarProducto($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto->imagen) {
            Storage::disk('public')->delete($producto->imagen);
        }

        $producto->delete();

        return redirect()->route('producto.index')->with('status', '¡Producto eliminado con éxito!');
    }
}
