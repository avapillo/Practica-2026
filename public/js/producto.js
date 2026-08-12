// Manejo de botones de nuevo producto
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modalProducto');
    const btnAbrirModal = document.getElementById('btnAbrirModal');
    const btnCerrarModal = document.getElementById('btnCerrarModal');
    const formProducto = document.getElementById('formProducto');
    const grillaProductos = document.getElementById('grillaProductos');

    // 1. Abrir subpanel
    btnAbrirModal.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // 2. Cerrar subpanel
    btnCerrarModal.addEventListener('click', () => {
        modal.classList.add('hidden');
        formProducto.reset();
    });

    // 3. Procesar formulario y agregar tarjeta
    formProducto.addEventListener('submit', (e) => {
        e.preventDefault(); // Evita recargar la página

        const nombre = document.getElementById('nombre').value;
        const precio = document.getElementById('precio').value;

        // Crear la estructura HTML de la tarjeta
        const tarjeta = document.createElement('div');
        tarjeta.classList.add('tarjeta-producto');

        tarjeta.innerHTML = `
            <div class="foto-producto">
                🖼️
            </div>
            <div class="info-producto">
                <h4>${nombre}</h4>
                <p>$${precio}</p>
            </div>
            <div class="acciones-tarjeta">
                <button class="btn-accion btn-modificar">✏️ Modificar</button>
                <button class="btn-accion btn-eliminar">🗑️ Eliminar</button>
            </div>
        `;

        // Asignar funciones a los subbotones de la tarjeta creada
        tarjeta.querySelector('.btn-eliminar').addEventListener('click', () => {
            tarjeta.remove();
        });

        tarjeta.querySelector('.btn-modificar').addEventListener('click', () => {
            alert(`Función para modificar "${nombre}" en desarrollo.`);
        });

        // Insertar la tarjeta en la grilla
        grillaProductos.appendChild(tarjeta);

        // Limpiar formulario y ocultar modal
        formProducto.reset();
        modal.classList.add('hidden');
    });
});
