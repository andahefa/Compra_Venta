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
}
