<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Articulo extends Model
{
	public $timestamps = false;
    protected $table = 'articulo';
    protected $primaryKey = 'id_articulo';
    protected $fillable = ['id_articulo','id_categoria', 'id_estado_articulo','marca','referencia','descripcion', 'id_cliente'];

    /*Funcion que permite realizar un filtro por estao del contrato*/
    public function scopeestadoContrato($query, $valor){

    	if($valor != ""){

            
    		switch (strtolower($valor)) {
    			case 'sin contrato':
    				return $query->where('id_estado_Articulo', 2);
    				break;
    			case 'en bodega':
    				return $query->where('id_estado_Articulo', 1);
    				break;
    			case 'en venta':
    				return $query->where('id_estado_Articulo', 3);
    				break;
    			case 'entregado':
    				return $query->where('id_estado_Articulo', 4);
    				break;
    			case 'vendido':
    				return $query->where('id_estado_Articulo', 5);
    				break;
    			default:
    				return $query
                    ->where('marca', 'like', "%" . $valor . "%")
                    ->orWhere('referencia', 'like', "%" . $valor . "%")
                    ->orWhere('descripcion', 'like', "%" . $valor . "%")
                    ->orWhere('id_cliente', 'like', "%" . $valor . "%");
    				break;
    		}
    	 
    	}
    }

}
