<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Control - Cevichería Gabriel</title>
  <!-- Enlace al archivo de estilos CSS en la carpeta public/css -->
  <link rel="stylesheet" href="{{ asset('css/styleControlPlatos.css') }}">
</head>
<body>


  <!-- CONTENEDOR PRINCIPAL: Envuelve todo el sitio web -->
  <div class="contenedor-sitio">

    <!-- BARRA LATERAL (MENU) -->
    <aside class="barra-lateral">
      <div class="logo-sistema">
        <h3>Sanwichería Gabriel</h3>
      </div>

      <!-- Opciones del menú -->
      <nav class="menu-navegacion">
        <a href="Inicio" class="opcion-menu activa">📊 Panel Principal</a>
        <a href="Platos" class="opcion-menu">👥 Platos</a>
        <a href="#" class="opcion-menu">🐟 Productos / Menú</a>
        <a href="#" class="opcion-menu">💰 Ventas</a>
        <a href="#" class="opcion-menu">⚙️ Configuración</a>
      </nav>
    </aside>

  </div>

</body>
</html>
