<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';
    protected $primaryKey = 'Id_Articulo';
    public $timestamps = false;

    protected $fillable = ['Nombre', 'Descripcion', 'CantInventario', 'Precio'];
}
