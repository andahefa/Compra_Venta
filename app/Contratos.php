<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contratos extends Model
{
    //

    public $timestamps = false;
    protected $table = 'contratos';
    protected $primaryKey = 'id_contrato';
    protected $fillable = ['id_contrato', 'id_estado_contrato', 'valor_prestado', 
						  'fecha_prestamo', 'valor_intereses', 'fecha_vencimiento_contrato'];

	public function scopeFiltro($query, $valor){

    	if($valor != ""){

            
    		/*switch (strtolower($valor)) {
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
    		}*/
    				return $query
    		  		->where('contratos.id_contrato', 'like', "%" . $valor . "%")
                    ->orWhere('contratos.id_estado_contrato', 'like', "%" . $valor . "%")
                    ->orWhere('contratos.valor_prestado', 'like', "%" . $valor . "%")
                    ->orWhere('contratos.fecha_prestamo', 'like', "%" . $valor . "%")
                    ->orWhere('contratos.valor_intereses', 'like', "%" . $valor . "%")
                    ->orWhere('contratos.fecha_vencimiento_contrato', 'like', "%" . $valor . "%")
                    ->orWhere('nombres', 'like', "%" . $valor . "%")
                    ->orWhere('apellidos', 'like', "%" . $valor . "%")
                    ->orWhere('nombre', 'like', "%" . $valor . "%");
                    
    	}
    }
}
