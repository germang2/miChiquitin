<?php

namespace App\Models\Contabilidad;

use Illuminate\Database\Eloquent\Model;

class pagoProveedores extends Model
{
    //
    protected $table = 'pago_proveedores';

    protected $fillable = [
                                'fecha_pago', 'fecha_orden', 'valor_pagar', 'id_pedido',
                                'id_plan_pago', 'estado',

                            ];

}
