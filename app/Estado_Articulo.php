<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Articulo extends Model
{
    public $timestamps = false;
    protected $table = 'estado_articulo';
    protected $fillable = ['id_estado_articulo','nombre'];
}
