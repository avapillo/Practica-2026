document.addEventListener('DOMContentLoaded', () => {
  // ----------------------------------------------------
  // 1. MODAL AGREGAR PRODUCTO
  // ----------------------------------------------------
  const btnAbrirModal = document.getElementById('btnAbrirModal');
  const btnCerrarModal = document.getElementById('btnCerrarModal');
  const modalProducto = document.getElementById('modalProducto');
  const formProducto = document.getElementById('formProducto');

  if (btnAbrirModal && modalProducto) {
    btnAbrirModal.addEventListener('click', () => {
      modalProducto.classList.remove('hidden');
    });
  }

  if (btnCerrarModal && modalProducto) {
    btnCerrarModal.addEventListener('click', () => {
      modalProducto.classList.add('hidden');
      if (formProducto) formProducto.reset(); // Limpia los campos al cerrar
    });
  }

  // ----------------------------------------------------
  // 2. MODAL MODIFICAR PRODUCTO
  // ----------------------------------------------------
  const modalEditar = document.getElementById('modalEditarProducto');
  const btnCerrarEditar = document.getElementById('btnCerrarModalEditar');
  const inputEditId = document.getElementById('edit_id');
  const inputEditNombre = document.getElementById('edit_nombre');
  const inputEditPrecio = document.getElementById('edit_precio');
  const selectEditCategoria = document.getElementById('edit_fk_id_categoira');

  document.querySelectorAll('.btn-modificar').forEach(boton => {
    boton.addEventListener('click', () => {
      // Obtenemos los datos desde los atributos data-* de la tarjeta
      const id = boton.getAttribute('data-id');
      const nombre = boton.getAttribute('data-nombre');
      const precio = boton.getAttribute('data-precio');
      const fkCategoria = boton.getAttribute('data-fk_id_categoira');

      // Cargamos los datos en el formulario de edición
      if (inputEditId) inputEditId.value = id;
      if (inputEditNombre) inputEditNombre.value = nombre;
      if (inputEditPrecio) inputEditPrecio.value = precio;
      if (selectEditCategoria) selectEditCategoria.value = fkCategoria;

      if (modalEditar) modalEditar.classList.remove('hidden');
    });
  });

  if (btnCerrarEditar && modalEditar) {
    btnCerrarEditar.addEventListener('click', () => {
      modalEditar.classList.add('hidden');
    });
  }

  // ----------------------------------------------------
  // 3. FILTRADO POR CATEGORÍAS
  // ----------------------------------------------------
  document.querySelectorAll('.btn-filtro').forEach(boton => {
    boton.addEventListener('click', () => {
      const categoriaId = boton.getAttribute('data-id');
      // Redirige pasando el ID por la URL
      window.location.href = `/Producto?fk_id_categoira=${categoriaId}`;
    });
  });
});
