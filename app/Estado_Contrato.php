<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_Contrato extends Model
{
    //

    public $timestamps = false;
    protected $table = 'estado_contrato';
    protected $primaryKey = 'id_estado';
    protected $fillable = ['id_estado','nombre'];
}
