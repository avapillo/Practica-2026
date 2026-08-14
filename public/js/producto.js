// public/js/producto.js

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('modalProducto');
    const btnAbrirModal = document.getElementById('btnAbrirModal');
    const btnCerrarModal = document.getElementById('btnCerrarModal');
    const formProducto = document.getElementById('formProducto');

    // 1. Abrir el Modal al presionar el botón verde
    if (btnAbrirModal && modal) {
        btnAbrirModal.addEventListener('click', () => {
            modal.classList.remove('hidden');
        });
    }

    // 2. Cerrar el Modal al presionar Cancelar
    if (btnCerrarModal && modal && formProducto) {
        btnCerrarModal.addEventListener('click', () => {
            modal.classList.add('hidden');
            formProducto.reset(); // Resetea los campos ingresados
        });
    }
});
