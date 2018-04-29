<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo_Contrato extends Model
{
    //
    public $timestamps = false;
    protected $table = 'articulo_contrato';
    protected $fillable = ['id_articulo', 'id_contrato'];
}
