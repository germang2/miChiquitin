<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventario\Articulo;

class CompraProducto extends Controller
{
	public function compra($id_producto, $cantidad){
		$Producto = Articulo::where("id", $id_producto)->get();
		if($Producto[0]->cantidad >= $cantidad){
			$cantidadInv = $Producto[0]->cantidad;
			$nuevaCantidad = $cantidadInv - $cantidad;
			Articulo::where('id', $id_producto)->update(['cantidad' => $nuevaCantidad]);
			echo "Cantidad actualizada, el inventario disponible ahora es:".$nuevaCantidad;
		}
		else{
			echo "No hay inventario suficiente del producto";
		}
	}
}
