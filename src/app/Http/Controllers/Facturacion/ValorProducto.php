<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Inventario\Articulo;

class ValorProducto extends Controller
{
    public function valor($id_producto){

    	$Producto = Articulo::where("id", $id_producto)->get();
    	if($Producto[0]->cantidad > 0){
	    	$PrecioBase = $Producto[0]->precio_basico;
	    	$PrecioProducto = $PrecioBase + ($PrecioBase*0.25);
	    	echo "El precio de base del producto es: ".$PrecioBase;
	    	echo "\n El precio real del producto es: ".$PrecioProducto;
	    }else{
	    	echo "No hay disponibilidad del producto";
	    }
    }
}
