<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Control - Sandwichería Gabriel</title>
  <link rel="stylesheet" href="{{ asset('css/style_producto.css') }}">
</head>
<body>

  <div class="contenedor-sitio">

    <!-- BARRA LATERAL (MENU) -->
    <aside class="barra-lateral">
      <div class="logo-sistema">
        <h3>Sandwichería Gabriel</h3>
      </div>
      <nav class="menu-navegacion">
        <a href="/" class="opcion-menu">Principal</a>
        <a href="Mesas" class="opcion-menu"> Mesas</a>
        <a href="{{ route('producto.index') }}" class="opcion-menu activa">Producto</a>
        <a href="#" class="opcion-menu">Ventas</a>
        <a href="ProductoLlevar" class="opcion-menu">Para Llevar</a>
      </nav>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="contenido-principal">
      <header class="encabezado-seccion">
        <h2>Gestión de Productos</h2>

        <!-- Mensaje con id "mensajeStatus" para que JS lo identifique y lo desaparezca -->
        @if (session('status'))
          <div id="mensajeStatus" style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #c3e6cb;">
            {{ session('status') }}
          </div>
        @endif

        <button id="btnAbrirModal" class="btn-agregar">➕ Nuevo Producto</button>
      </header>

      <!-- GRILLA DE TARJETAS DE PRODUCTOS -->
      <section id="grillaProductos" class="grilla-productos">

        @foreach ($productos as $producto)
          <div class="tarjeta-producto" id="producto-{{ $producto->id }}">
            <div class="foto-producto">
              @if($producto->imagen)
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" style="width:100%; height:100%; object-fit:cover;">
              @else
                🖼️
              @endif
            </div>

            <div class="info-producto">
              <h4>{{ $producto->nombre }}</h4>
              <p>${{ $producto->precio }}</p>
            </div>

            <div class="acciones-tarjeta">
              <button class="btn-accion btn-modificar"
                      data-id="{{ $producto->id }}"
                      data-nombre="{{ $producto->nombre }}"
                      data-precio="{{ $producto->precio }}">✏️ Modificar</button>

              <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-accion btn-eliminar">🗑️ Eliminar</button>
              </form>
            </div>
          </div>
        @endforeach

      </section>
    </main>

  </div>

  <!-- MODAL 1: REGISTRAR PRODUCTO -->
  <div id="modalProducto" class="modal-overlay hidden">
    <div class="modal-content">
      <h3>Agregar Nuevo Producto</h3>

      <form id="formProducto" action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grupo-campo">
          <label for="nombre">Nombre del Producto:</label>
          <input type="text" id="nombre" name="nombre" required placeholder="Ej: Lomito Completo" value="{{ old('nombre') }}">
          @error('nombre') <span style="color:red; font-size:12px;">{{ $message }}</span> @enderror
        </div>

        <div class="grupo-campo">
          <label for="precio">Precio ($):</label>
          <input type="number" id="precio" name="precio" required placeholder="Ej: 3500" value="{{ old('precio') }}">
          @error('precio') <span style="color:red; font-size:12px;">{{ $message }}</span> @enderror
        </div>

        <div class="grupo-campo">
          <label for="imagen">Imagen del Producto:</label>
          <input type="file" id="imagen" name="imagen" accept="image/*">
          @error('imagen') <span style="color:red; font-size:12px;">{{ $message }}</span> @enderror
        </div>

        <div class="modal-botones">
          <button type="button" id="btnCerrarModal" class="btn-cancelar">Cancelar</button>
          <button type="submit" class="btn-guardar">Guardar Producto</button>
        </div>
      </form>
    </div>
  </div>

  <!-- MODAL 2: MODIFICAR PRODUCTO -->
  <div id="modalEditarProducto" class="modal-overlay hidden">
    <div class="modal-content">
      <h3>Modificar Producto</h3>

      <form action="{{ route('producto.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="edit_id" name="id">

        <div class="grupo-campo">
          <label for="edit_nombre">Nombre del Producto:</label>
          <input type="text" id="edit_nombre" name="nombre" required>
        </div>

        <div class="grupo-campo">
          <label for="edit_precio">Precio ($):</label>
          <input type="number" id="edit_precio" name="precio" required>
        </div>

        <div class="grupo-campo">
          <label for="edit_imagen">Nueva Imagen (Opcional):</label>
          <input type="file" id="edit_imagen" name="imagen" accept="image/*">
        </div>

        <div class="modal-botones">
          <button type="button" id="btnCerrarModalEditar" class="btn-cancelar">Cancelar</button>
          <button type="submit" class="btn-guardar">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>

  <script src="{{ asset('js/producto.js') }}"></script>
</body>
</html>
