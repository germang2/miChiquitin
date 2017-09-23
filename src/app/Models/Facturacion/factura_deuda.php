<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaDeuda extends Model
{
    protected $table = 'factura_deuda';

    protected $fillable = ['id_factura', 'abono', 'fecha', 'hora'];

    public function factura() {
        return $this->belongsTo('App\Facturacion\Factura');
    }

    // cartera necesita conocer el abono
    // public function pago() {
    //   return $this->belongsTo('App\Cartera\Pago');
    // }
}
