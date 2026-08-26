<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "seccion";
        protected $fillable = ["seccion"];
    public $timestamps = false;
}
