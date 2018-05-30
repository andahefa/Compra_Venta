<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricoPagos extends Model
{
    //


    public $timestamps = false;
    protected $table = 'historico_pagos';
    protected $primaryKey = 'id_historico';
    protected $fillable = ['id_historico','id_pago_interes', 'id_contrato','fecha_pago', 'valor_pago', 'cuota_pagada', 'fecha_ultima_modificacion'];

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
    		  		->where('historico_pagos.id_historico', 'like', "%" . $valor . "%")
                    ->orWhere('historico_pagos.id_pago_interes', 'like', "%" . $valor . "%")
                    ->orWhere('historico_pagos.id_contrato', 'like', "%" . $valor . "%")
                    ->orWhere('historico_pagos.fecha_pago', 'like', "%" . $valor . "%")
                    ->orWhere('historico_pagos.valor_pago', 'like', "%" . $valor . "%")
                    ->orWhere('historico_pagos.cuota_pagada', 'like', "%" . $valor . "%")
                    ->orWhere('historico_pagos.fecha_ultima_modificacion', 'like', "%" . $valor . "%")
                    ->orWhere('nombres', 'like', "%" . $valor . "%")
                    ->orWhere('apellidos', 'like', "%" . $valor . "%");
    	 
    	}
    }
}
