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

     public function scopeFiltro($query, $valor){

    	if($valor != ""){

    				return $query
    				->where('num_cedula', 'like', "%" . $valor . "%")
                    ->orWhere('nombres', 'like', "%" . $valor . "%")
                    ->orWhere('apellidos', 'like', "%" . $valor . "%")
                    ->orWhere('telefono', 'like', "%" . $valor . "%")
                    ->orWhere('direccion_residencia', 'like', "%" . $valor . "%");
    	 
    	}
    }
}
