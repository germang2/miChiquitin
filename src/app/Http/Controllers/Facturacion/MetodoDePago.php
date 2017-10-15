<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MetodoDePago extends Controller
{
	public function metodoPago($metodo, $totalProductos){
		if ($metodo == "efectivo"){
			$totalFactura = $totalProductos - ($totalProductos*0.05);
			echo "EL total de la factura es $totalFactura";
		}

		if ($metodo == "credito") {
			echo "Se ha elegido el metodo de pago a credito";
		}
	}
}
