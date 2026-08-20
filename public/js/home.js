// 1. URL de tu propia API en Laravel (historial de caja)
// const DIRECCION_API = 'http://127.0.0.1:8000/api/historial-caja';
const DIRECCION_API = '/api/historial-caja';

// 2. Esperar a que el HTML esté listo en el navegador
document.addEventListener('DOMContentLoaded', () => {
  solicitarDatosServidor();
});

// 3. Función que conecta con tu API de Laravel
function solicitarDatosServidor() {
  const etiquetaEstado = document.getElementById('estado-api');

  // Hacemos la llamada HTTP (GET) a tu servidor local
  fetch(DIRECCION_API)
    .then(respuestaBruta => {
      // Si el servidor responde con un error (ej. 404 o 500)
      if (!respuestaBruta.ok) {
        throw new Error(`Error en el servidor. Código: ${respuestaBruta.status}`);
      }
      // Si todo está bien, transformamos la respuesta JSON en objetos de JavaScript
      return respuestaBruta.json();
    })
    .then(listaDeRegistros => {
      // Enviamos los datos recibidos de la base de datos para dibujar la tabla
      construirFilasTabla(listaDeRegistros);

      // Actualizamos el mensaje de éxito en la pantalla
      etiquetaEstado.textContent = '✅ Datos sincronizados con éxito';
      etiquetaEstado.style.color = '#16a34a'; // Color verde
    })
    .catch(error => {
      // Si no hay internet, el servidor está apagado o la API falló, entra aquí
      console.error('Detalles del error:', error);
      etiquetaEstado.textContent = '❌ Error al conectar con el servidor';
      etiquetaEstado.style.color = '#dc2626'; // Color rojo
    });
}

// 4. Función encargada de tomar los datos de la caja e inyectarlos en el HTML
function construirFilasTabla(registrosCaja) {
  // Seleccionamos el cuerpo de la tabla (donde van los datos)
  const cuerpoTabla = document.querySelector('#tabla-datos tbody');

  // Limpiamos cualquier texto previo o fila vieja
  cuerpoTabla.innerHTML = '';

  // Recorremos el arreglo de registros de la base de datos uno por uno
  registrosCaja.forEach(registro => {
    // Creamos un elemento fila <tr> en memoria
    const nuevaFila = document.createElement('tr');

    // Procesamos el campo 'momento_cierre' para separar Fecha y Hora limpiamente
    const fechaObjeto = new Date(registro.momento_cierre);

    const fechaFormateada = fechaObjeto.toLocaleDateString('es-AR', {
      day: '2-digit',
      month: '2-digit',
      year: 'numeric'
    });

    const horaFormateada = fechaObjeto.toLocaleTimeString('es-AR', {
      hour: '2-digit',
      minute: '2-digit'
    });

    // Formateamos el monto monetario para que incluya puntos de miles (ej: 150.000)
    const montoFormateado = parseFloat(registro.monto_total).toLocaleString('es-CL');

    // Le agregamos las celdas usando las propiedades reales de tu MySQL
    nuevaFila.innerHTML = `
      <td><strong>${fechaFormateada}</strong></td>
      <td>${horaFormateada}</td>
      <td><strong>$${montoFormateado}</strong></td>
    `;

    // Metemos la fila terminada dentro del cuerpo de la tabla en el HTML
    cuerpoTabla.appendChild(nuevaFila);
  });
}
