<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaProducto extends Model
{
    protected $table = 'factura_producto';

    protected $fillable = ['id_factura', 'id_articulo', 'cantidad', 'precio_venta'];

    public function factura() {
      return $this->belongsTo('App\Facturacion\Factura');
    }

    // public function articulo() {
    //   return $this->hasMany('App\Inventario\Articulo');
    // }
}
