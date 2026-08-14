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
        <a href="#" class="opcion-menu"> Mesas</a>
        <a href="{{ route('producto.index') }}" class="opcion-menu activa">Producto</a>
        <a href="#" class="opcion-menu">Ventas</a>
        <a href="#" class="opcion-menu">Para Llevar</a>
      </nav>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="contenido-principal">
      <header class="encabezado-seccion">
        <h2>Gestión de Productos</h2>

        <!-- Notificación de éxito nativa de Laravel si se guardó correctamente -->
        @if (session('status'))
          <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 10px; border-radius: 5px;">
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
                <!-- Render dinámico y correcto del archivo real subido -->
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
              <button class="btn-accion btn-modificar">✏️ Modificar</button>
              <button class="btn-accion btn-eliminar">🗑️ Eliminar</button>
            </div>
          </div>
        @endforeach

      </section>
    </main>

  </div>

  <!-- MODAL / SUBPANEL OCULTO -->
  <div id="modalProducto" class="modal-overlay hidden">
    <div class="modal-content">
      <h3>Agregar Nuevo Producto</h3>

      <!-- El formulario ahora envía directamente los datos usando métodos Web tradicionales -->
      <form id="formProducto" action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">

        <!-- Token de protección obligatorio para peticiones POST en Laravel -->
        @csrf

        <div class="grupo-campo">
          <label for="nombre">Nombre del Producto:</label>
          <!-- AGREGADO: atributo name="nombre" para que PHP lo reciba -->
          <input type="text" id="nombre" name="nombre" required placeholder="Ej: Lomito Completo" value="{{ old('nombre') }}">
          @error('nombre') <span style="color:red">{{ $message }}</span> @enderror
        </div>

        <div class="grupo-campo">
          <label for="precio">Precio ($):</label>
          <!-- AGREGADO: atributo name="precio" -->
          <input type="number" id="precio" name="precio" required placeholder="Ej: 3500" value="{{ old('precio') }}">
          @error('precio') <span style="color:red">{{ $message }}</span> @enderror
        </div>

        <div class="grupo-campo">
          <label for="imagen">Imagen del Producto:</label>
          <!-- AGREGADO: atributo name="imagen" -->
          <input type="file" id="imagen" name="imagen" accept="image/*">
          @error('imagen') <span style="color:red">{{ $message }}</span> @enderror
        </div>

        <div class="modal-botones">
          <!-- Cambiamos a type="button" para que el de cancelar no intente enviar el formulario -->
          <button type="button" id="btnCerrarModal" class="btn-cancelar">Cancelar</button>
          <button type="submit" class="btn-guardar">Guardar Producto</button>
        </div>
      </form>
    </div>
  </div>

  <script src="{{ asset('js/producto.js') }}"></script>
</body>
</html>
