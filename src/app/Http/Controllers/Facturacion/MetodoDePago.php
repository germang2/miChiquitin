<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MetodoDePago extends Controller
{
	public function metodoPago($metodo, $valorTotal){
		if ($metodo == "efectivo"){
			$totalFactura = $valorTotal - ($valorTotal*0.05);
			echo "EL total de la factura es $totalFactura";
			return $totalFactura;
		}

		if ($metodo == "credito") { // Llama a lo que hizo Caro
			echo "Se ha elegido el metodo de pago a credito";
		}
	}
}
