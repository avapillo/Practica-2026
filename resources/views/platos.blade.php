<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sanwicheria Gabriel - Platos</title>

    <!-- FontAwesome para los íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/platos_styles.css') }}">
</head>
<body>

    <div class="app-container">
        <!-- BARRA LATERAL (SIDEBAR) -->
        <aside class="sidebar">
            <div class="user-avatar">
                <i class="fa-solid fa-user"></i>
            </div>

            <nav class="sidebar-nav">
                <button class="nav-btn" data-url="{{ route('home') }}" title="Inicio">
                    <i class="fa-solid fa-house"></i>
                </button>
                <button class="nav-btn" data-url="{{ route('platos') }}" title="Registros de Platos">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
                <button class="nav-btn" data-url="{{ route('control_mesa') }}" title="Control de Mesas">
                    <i class="fa-solid fa-utensils"></i>
                </button>
                <button class="nav-btn" data-url="{{ route('panel_pedido') }}" title="Pedidos para llevar">
                    <i class="fa-solid fa-bucket"></i>
                </button>
                <button class="nav-btn active" data-url="#" title="Platos (Categorías)">
                    <i class="fa-solid fa-chart-pie"></i>
                </button>
                <button class="nav-btn" data-url="{{ route('historial.index') }}" title="Historial">
                    <i class="fa-solid fa-business-time"></i>
                </button>
            </nav>
        </aside>

        <!-- CONTENIDO PRINCIPAL -->
        <main class="main-content">
            <!-- CABECERA -->
            <header class="top-header">
                <h1 class="brand-title">Sanwicheria Gabriel</h1>
                <div class="date-badge">20/05/26</div>
            </header>

            <!-- BARRA DE CATEGORÍAS -->
            <section class="categories-section">
                <span class="categories-label">Categorias:</span>
                <div class="category-pills">
                    <button class="pill-btn active">Sanwiches</button>
                    <button class="pill-btn">Empanada</button>
                    <button class="pill-btn">Pizzas</button>
                    <button class="pill-btn">Bebidas</button>
                </div>
            </section>

            <!-- BOTÓN ACCIÓN -->
            <div class="actions-bar">
                <button class="btn-new-dish" id="btnNuevoPlato">
                    Nuevo Plato
                </button>
            </div>

            <!-- GRILLA DE PLATOS -->
            <section class="dishes-grid">
                <!-- TARJETA DE PLATO -->
                <div class="dish-card">
                    <div class="dish-image-placeholder">
                        <i class="fa-solid fa-image"></i>
                    </div>
                    <div class="dish-info">
                        <span class="dish-type-label">Tipo:</span>
                        <h3 class="dish-name">Napolitana</h3>
                        <p class="dish-price">$ 35000</p>
                    </div>
                    <div class="dish-actions">
                        <button class="action-circle btn-edit" title="Editar Plato"></button>
                        <button class="action-circle btn-delete" title="Eliminar Plato"></button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- JS Personalizado -->
    <script src="{{ asset('js/platos.js') }}"></script>
</body>
</html>
