<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura';

    protected $fillable = ['fecha', 'id_cliente', 'id_plan_pago', 'cuotas', 'valor_cuota', 'id_vendedor', 'valor_total', 'estado'];

    public function factura_producto() {
      return $this->hasMany('App\Facturacion\FacturaProducto');
    }

    public function factura_deuda() {
        return $this->hasOne('App\Facturacion\FacturaDeuda');
    }

    // public function clientes() {
    //   return $this->belongsTo('App\Usuarios\Clientes');
    // }
    //
    // public function vendedor() {
    //   return $this->belongsTo('App\Usuarios\Vendedor');
    // }
}
