<?php

namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class balance extends Model
{
    //

    protected $table = 'balances';

    protected $fillable=[
        'fecha', 'efectivo', 'cuentas_cobrar', 'cuentas_pagar', 'impuestos', 'activos', 'pasivos', 'total'
    ];
}
