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

  <!-- CONTENEDOR PRINCIPAL -->
  <div class="contenedor-sitio">

    <!-- BARRA LATERAL (MENU) -->
    <aside class="barra-lateral">
      <div class="logo-sistema">
        <h3>Sanwichería Gabriel</h3>
      </div>
      <nav class="menu-navegacion">
        <a href="Inicio" class="opcion-menu">📊 Panel Principal</a>
        <a href="#" class="opcion-menu"> Mesas</a>
        <a href="Producto" class="opcion-menu activa">👥 Producto</a>
        <a href="#" class="opcion-menu">💰 Ventas</a>
        <a href="#" class="opcion-menu">⚙️ Configuración</a>
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
        <!-- Las tarjetas se agregarán dinámicamente aquí mediante JavaScript -->
      </section>
    </main>

  </div>

  <!-- SUBPANEL / MODAL OCULTO PARA AGREGAR PRODUCTO -->
  <div id="modalProducto" class="modal-overlay hidden">
    <div class="modal-content">
      <h3>Agregar Nuevo Producto</h3>
      <form id="formProducto">
        <div class="grupo-campo">
          <label for="nombre">Nombre del Producto:</label>
          <input type="text" id="nombre" required placeholder="Ej: Lomito Completo">
        </div>
        <div class="grupo-campo">
          <label for="precio">Precio ($):</label>
          <input type="number" id="precio" required placeholder="Ej: 3500">
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
