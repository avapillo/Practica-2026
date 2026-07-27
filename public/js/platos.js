document.addEventListener('DOMContentLoaded', () => {
    // Navegación por la barra lateral
    const navButtons = document.querySelectorAll('.nav-btn');
    navButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const targetUrl = btn.getAttribute('data-url');
            if (targetUrl && targetUrl !== '#') {
                window.location.href = targetUrl;
            }
        });
    });

    // Cambiar categoría activa
    const categoryButtons = document.querySelectorAll('.pill-btn');
    categoryButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            categoryButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        });
    });

    // Evento para "Nuevo Plato"
    const btnNuevoPlato = document.getElementById('btnNuevoPlato');
    if (btnNuevoPlato) {
        btnNuevoPlato.addEventListener('click', () => {
            console.log('Abrir modal de crear plato...');
        });
    }
});
