<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";

    protected $fillable = ["nombre", "precio", "imagen", "fk_id_categoira"];

    public $timestamps = false;

    public function categoria()
    {
        // El tercer parámetro es el nombre exacto de la Primary Key en la tabla 'categorias'
        // Cambia 'id' por el nombre real de la PK en tu tabla categorías si es diferente (ej: 'id_categoria')
        return $this->belongsTo(Categoria::class, 'fk_id_categoira', 'id');
    }
}
