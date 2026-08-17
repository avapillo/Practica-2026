document.addEventListener('DOMContentLoaded', () => {
    // Referencias para el Modal de Crear
    const modalCrear = document.getElementById('modalProducto');
    const btnAbrirCrear = document.getElementById('btnAbrirModal');
    const btnCerrarCrear = document.getElementById('btnCerrarModal');
    const formProducto = document.getElementById('formProducto');

    // Referencias para el Modal de Editar
    const modalEditar = document.getElementById('modalEditarProducto');
    const btnCerrarEditar = document.getElementById('btnCerrarModalEditar');
    const inputEditId = document.getElementById('edit_id');
    const inputEditNombre = document.getElementById('edit_nombre');
    const inputEditPrecio = document.getElementById('edit_precio');

    // 1. Abrir/Cerrar Modal Crear
    if (btnAbrirCrear && modalCrear) {
        btnAbrirCrear.addEventListener('click', () => modalCrear.classList.remove('hidden'));
    }
    if (btnCerrarCrear && modalCrear && formProducto) {
        btnCerrarCrear.addEventListener('click', () => {
            modalCrear.classList.add('hidden');
            formProducto.reset();
        });
    }

    // 2. Cargar datos en Modal Editar al hacer clic en "Modificar"
    document.querySelectorAll('.btn-modificar').forEach(boton => {
        boton.addEventListener('click', () => {
            inputEditId.value = boton.getAttribute('data-id');
            inputEditNombre.value = boton.getAttribute('data-nombre');
            inputEditPrecio.value = boton.getAttribute('data-precio');

            modalEditar.classList.remove('hidden');
        });
    });

    if (btnCerrarEditar && modalEditar) {
        btnCerrarEditar.addEventListener('click', () => modalEditar.classList.add('hidden'));
    }

    // 3. Temporizador para ocultar el mensaje de éxito (session status) automáticamente
    const mensajeStatus = document.getElementById('mensajeStatus');
    if (mensajeStatus) {
        setTimeout(() => {
            mensajeStatus.style.transition = 'opacity 0.5s ease';
            mensajeStatus.style.opacity = '0';

            setTimeout(() => {
                mensajeStatus.remove();
            }, 500); // Se elimina del HTML tras terminar la animación de desvanecimiento
        }, 3500); // 3.5 segundos visible
    }
});
