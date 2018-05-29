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
}
