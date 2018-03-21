<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Articulo extends Model
{
	public $timestamps = false;
    protected $table = 'articulo';
    protected $fillable = ['id_articulo','id_categoria', 'id_estado_articulo','marca','referencia','descripcion'];
}
