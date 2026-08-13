<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Control - Cevichería Gabriel</title>
  <!-- Enlace al archivo de estilos CSS en la carpeta public/css -->
  <link rel="stylesheet" href="{{ asset('css/style_producto.css') }}">
</head>
<body>

  <!-- 1. SOLUCIÓN AL ERROR: Token de seguridad oculto que JavaScript leerá automáticamente -->
  <input type="hidden" id="csrfToken" value="{{ csrf_token() }}">

  <!-- CONTENEDOR PRINCIPAL -->
  <div class="contenedor-sitio">

    <!-- BARRA LATERAL (MENU) -->
    <aside class="barra-lateral">
      <div class="logo-sistema">
        <h3>Sanwichería Gabriel</h3>
      </div>
      <nav class="menu-navegacion">
        <a href="Inicio" class="opcion-menu">Panel Principal</a>
        <a href="#" class="opcion-menu"> Mesas</a>
        <a href="Producto" class="opcion-menu activa">Producto</a>
        <a href="#" class="opcion-menu">Ventas</a>
        <a href="#" class="opcion-menu">Configuración</a>
      </nav>
    </aside>

    <!-- CONTENIDO PRINCIPAL AL COSTADO DEL MENU -->
    <main class="contenido-principal">
      <header class="encabezado-seccion">
        <h2>Gestión de Productos</h2>
        <!-- Botón para agregar producto -->
        <button id="btnAbrirModal" class="btn-agregar">➕ Nuevo Producto</button>
      </header>

      <!-- GRILLA DE TARJETAS DE PRODUCTOS -->
      <section id="grillaProductos" class="grilla-productos">

        <!-- 2. SOLUCIÓN PARA MOSTRAR: PHP dibuja los productos que ya existen en tu base de datos -->
        @foreach ($productos as $producto)
          <div class="tarjeta-producto" id="producto-{{ $producto->id }}">
            <div class="foto-producto">
              @if($producto->imagen)
                <!-- Si el producto tiene imagen guardada en la BD, la muestra -->
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" style="width:100%; height:100%; object-fit:cover;">
              @else
                <!-- Si no tiene imagen, muestra el icono por defecto -->
                🖼️
              @endif
            </div>
            <div class="info-producto">
              <h4>{{ $producto->nombre }}</h4>
              <p>${{ $producto->precio }}</p>
            </div>
            <div class="acciones-tarjeta">
              <button class="btn-accion btn-modificar">✏️ Modificar</button>
              <!-- Al hacer clic, le manda el ID correcto de la BD a tu función global de JavaScript -->
              <button class="btn-accion btn-eliminar" onclick="eliminarProducto({{ $producto->id }})">🗑️ Eliminar</button>
            </div>
          </div>
        @endforeach

      </section>
    </main>

  </div>

  <!-- SUBPANEL / MODAL OCULTO PARA AGREGAR PRODUCTO -->
  <div id="modalProducto" class="modal-overlay hidden">
    <div class="modal-content">
      <h3>Agregar Nuevo Producto</h3>

      <!-- 3. SOLUCIÓN PARA IMÁGENES: Agregamos enctype para que el formulario acepte archivos físicos -->
      <form id="formProducto" enctype="multipart/form-data">
        <div class="grupo-campo">
          <label for="nombre">Nombre del Producto:</label>
          <input type="text" id="nombre" required placeholder="Ej: Lomito Completo">
        </div>
        <div class="grupo-campo">
          <label for="precio">Precio ($):</label>
          <input type="number" id="precio" required placeholder="Ej: 3500">
        </div>

        <!-- 4. SOLUCIÓN: Agregamos el campo input de tipo file con id="imagen" en español -->
        <div class="grupo-campo">
          <label for="imagen">Imagen del Producto:</label>
          <input type="file" id="imagen" accept="image/*">
        </div>

        <div class="modal-botones">
          <button type="button" id="btnCerrarModal" class="btn-cancelar">Cancelar</button>
          <button type="submit" class="btn-guardar">Guardar Producto</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Enlace al JavaScript en public/js/productos.js -->
  <script src="{{ asset('js/producto.js') }}"></script>
</body>
</html>
