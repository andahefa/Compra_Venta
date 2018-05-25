<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuotasVencidas extends Model
{
    //

     protected $table = 'cuotas_vencidas';
    protected $primaryKey = 'id_cuota_vencida';
    protected $fillable = ['id_contrato', 'fecha_vencimiento', 'cuota_vencida'];
}
