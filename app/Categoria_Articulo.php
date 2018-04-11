<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_Articulo extends Model
{
    //
    public $timestamps = false;
    protected $table = 'categoria_articulo';
    protected $primaryKey = 'id_articulo';
    protected $fillable = ['id_categoria, nombre'];
}
