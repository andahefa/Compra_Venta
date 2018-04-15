<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //

    public $timestamps = false;
    protected $table = 'clientes';
    protected $primaryKey = 'num_cedula';
    protected $fillable = ['num_cedula', 'nombres', 'apellidos', 'telefono', 'direccion_residencia'];
}
