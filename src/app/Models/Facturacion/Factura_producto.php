<?php

namespace App\Models\Facturacion;

use Illuminate\Database\Eloquent\Model;

class FacturaProducto extends Model
{
    protected $table = 'factura_productos';

    protected $fillable = ['id_factura', 'id_articulo', 'cantidad', 'precio_venta'];

    public function factura() {
      return $this->belongsTo('App\Models\Facturacion\Factura');
    }

    public function articulo() {
      return $this->belongsTo('App\Models\Inventario\Articulo');
    }
}
