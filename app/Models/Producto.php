<?php

namespace App\Models;

// CORRECCIÓN: Volvemos a importar la clase base real de Laravel
use Illuminate\Database\Eloquent\Model;

// Tu clase se llama Producto y extiende de Model
class Producto extends Model
{
    // Apunta a tu tabla de MySQL 'productos'
    protected $table = "productos";

    // Campos autorizados para guardar en español
    protected $fillable = ["nombre", "precio", "imagen"];
}
