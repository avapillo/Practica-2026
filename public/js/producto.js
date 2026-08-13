// Manejo de botones de nuevo producto e interacción con la base de datos
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modalProducto');
    const btnAbrirModal = document.getElementById('btnAbrirModal');
    const btnCerrarModal = document.getElementById('btnCerrarModal');
    const formProducto = document.getElementById('formProducto');
    const grillaProductos = document.getElementById('grillaProductos');

    // Captura segura del Token CSRF de Laravel
    const tokenInput = document.getElementById('csrfToken');
    const token = tokenInput ? tokenInput.value : '';

    // 1. Abrir subpanel (Modal)
    if (btnAbrirModal && modal) {
        btnAbrirModal.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });
    }

    // 2. Cerrar subpanel (Modal)
    if (btnCerrarModal && modal && formProducto) {
        btnCerrarModal.addEventListener('click', () => {
            modal.classList.add('hidden');
            formProducto.reset();
        });
    }

    // 3. Procesar formulario y enviar a Laravel por API
    if (formProducto) {
        formProducto.addEventListener('submit', async (e) => {
            e.preventDefault(); // Evita que la página se recargue

            const nombre = document.getElementById('nombre').value;
            const precio = document.getElementById('precio').value;
            const imagenInput = document.getElementById('imagen') ? document.getElementById('imagen').files[0] : null;

            // Empaquetamos todo EN ESPAÑOL para que coincida con el validador del controlador
            const formData = new FormData();
            formData.append('nombre', nombre);
            formData.append('precio', precio);

            if (imagenInput) {
                formData.append('imagen', imagenInput);
            }

            try {
                // Petición asíncrona a la API de Laravel
                const response = await fetch('/api/registro-producto', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    body: formData
                });

                const resultado = await response.json();

                if (response.ok) {
                    // Si el servidor guardó con éxito en MySQL, creamos la tarjeta de inmediato
                    const fotoHTML = resultado.image_url
                        ? `<img src="${resultado.image_url}" alt="${resultado.product.nombre}" style="width:100%; height:100%; object-fit:cover;">`
                        : `🖼️`;

                    const tarjeta = document.createElement('div');
                    tarjeta.classList.add('tarjeta-producto');
                    tarjeta.id = `producto-${resultado.product.id}`;

                    tarjeta.innerHTML = `
                        <div class="foto-producto">${fotoHTML}</div>
                        <div class="info-producto">
                            <h4>${resultado.product.nombre}</h4>
                            <p>$${resultado.product.precio}</p>
                        </div>
                        <div class="acciones-tarjeta">
                            <button class="btn-accion btn-modificar">✏️ Modificar</button>
                            <button class="btn-accion btn-eliminar">🗑️ Eliminar</button>
                        </div>
                    `;

                    // Funcionalidad al botón eliminar de la nueva tarjeta asíncrona
                    tarjeta.querySelector('.btn-eliminar').addEventListener('click', () => {
                        eliminarProducto(resultado.product.id);
                    });

                    // Insertar la tarjeta al principio de la grilla
                    grillaProductos.insertBefore(tarjeta, grillaProductos.firstChild);

                    // Limpiar todo y cerrar modal
                    formProducto.reset();
                    modal.classList.add('hidden');
                    alert(resultado.mensaje);
                } else {
                    // Si hay error de validación, lo imprime detallado en la consola F12
                    console.error("Errores de validación:", resultado.errors);
                    alert("Hubo un error en la validación del servidor. Revisa la consola.");
                }

            } catch (error) {
                console.error("Error al conectar con el servidor:", error);
                alert("No se pudo establecer conexión con Laravel.");
            }
        });
    }
});

// 4. Función global para eliminar registros reales de la Base de Datos
async function eliminarProducto(id) {
    if (!confirm("¿Deseas eliminar este producto permanentemente de la base de datos?")) return;

    const tokenInput = document.getElementById('csrfToken');
    const token = tokenInput ? tokenInput.value : '';

    try {
        const response = await fetch(`/api/registro-producto/${id}`, { // O la ruta DELETE que configures después
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': token
            }
        });

        if (response.ok) {
            const elemento = document.getElementById(`producto-${id}`);
            if (elemento) elemento.remove();
        } else {
            alert("No se pudo eliminar el producto del servidor.");
        }
    } catch (error) {
        console.error("Error al eliminar:", error);
    }
}
