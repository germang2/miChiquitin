<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = "pagos";

    protected $fillable = ['id_factura_deuda', 'id_deuda', 'id_factura', 'valor'];

    public function deuda()
    {
    	return $this->belongsTo('App\Models\Cartera\Deuda');
    }
}
