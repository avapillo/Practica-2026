<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categoria';

    // Si tu clave primaria en la tabla categorías NO se llama 'id', debes agregar esta línea:
    // protected $primaryKey = 'id_categoria';

    public $timestamps = false;
}
