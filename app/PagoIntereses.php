<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagoIntereses extends Model
{
    //

    public $timestamps = false;
    protected $table = 'pago_intereses';
    protected $primaryKey = 'id_pago_interes';
    protected $fillable = ['id_pago_interes','id_contrato', 'fecha_pago', 'valor_pago', 'cuota_pagada'];

       public function scopeFiltro($query, $valor){

    	if($valor != ""){

    				return $query
    				->where('pago_intereses.id_pago_interes', 'like', "%" . $valor . "%")
                    ->orWhere('pago_intereses.id_contrato', 'like', "%" . $valor . "%")
                    ->orWhere('pago_intereses.fecha_pago', 'like', "%" . $valor . "%")
                    ->orWhere('pago_intereses.valor_pago', 'like', "%" . $valor . "%")
                    ->orWhere('pago_intereses.cuota_pagada', 'like', "%" . $valor . "%")
                    ->orWhere('nombres', 'like', "%" . $valor . "%")
                    ->orWhere('apellidos', 'like', "%" . $valor . "%");
    	 
    	}
    }
}
