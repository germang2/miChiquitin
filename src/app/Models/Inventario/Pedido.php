<?php
 
namespace App\Models\Inventario;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
	protected $table = "pedidos";
	
	protected $fillable = [ 'id_articulo', 'id_proveedor', 'cantidad', 'costo_total', 'fecha', 'estado'];
	
	public function proveedor(){
		return $this->belongsTo('App\Models\Inventario\Proveedor');
	}
	
	public function articulo(){
		return $this->belongsTo('App\Models\Inventario\Articulo');
	}
    
    public function pago_proveedores(){
    	return $this->hasMany('App\Models\Contabilidad\PagoProveedores');	
    }
}
