<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Se crea el modelo para poder hacer la consulta a la base de datos y traer los datos del historial de caja o otro archivo.

class HistorialCaja extends Model
{
    // CORRECCIÓN: Debe ser $table (en inglés)
    protected $table = 'historial_caja';

    // AGREGAR: Indica cuál es tu llave primaria real
    protected $primaryKey = 'id_historial';

    // OPCIONAL: Si tu tabla no tiene las columnas 'created_at' y 'updated_at', desactívalas así:
    // public $timestamps = false;
}
