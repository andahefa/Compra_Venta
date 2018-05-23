<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbonoCapital extends Model
{
    //
    public $timestamps = false;
    protected $table = 'abono_capital';
    protected $primaryKey = 'id_abono_capital';
    protected $fillable = ['id_contrato', 'fecha_abono', 'valor_abono'];
}
