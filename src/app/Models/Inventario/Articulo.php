<?php

namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
	protected $table = "articulos";
	
	protected $fillable [ 'id', 'nombre', 'descripcion', 'precio_basico', 'cantidad', 'id_proveedor', 'fecha'];
	
	public function proveedor(){
		return $this->belongsTo('App\Models\Inventario\Proveedor');
	}
	
	public function pedido(){
		return $this->hasOne('App\Models\Inventario\Pedido');
	}
    //
}
