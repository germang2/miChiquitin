<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuarios\User;
use App\Models\Facturacion\Factura;

class MetodoDePago extends Controller
{
	public function metodoPago($metodo, $valorTotal, $idCliente, $N, $idFactura ){
		if ($metodo == "efectivo"){
			$totalFactura = $valorTotal - ($valorTotal*0.05);

			return $totalFactura;
		}

		if ($metodo == "credito") { // Llama a lo que hizo Caro
			self::compraCredito($idCliente, $valorTotal, $N, $idFactura);
		}
	}


  public function numeroCuotas($N, $valorTotalCompra, $idFactura) {
    $factura = Factura::find($idFactura);
    $valorTotalCompra = $valorTotalCompra + ($valorTotalCompra * 0.05);
    $valorPagar = $valorTotalCompra * 0.10;
    $factura->update(['cuotas' => $N]);
    $factura->update(['valor_cuota' => ($valorTotalCompra - $valorPagar) / $N]);

    return $valorPagar;
  }

  public function compraCredito($idCliente, $valorTotalPago, $N, $idFactura) {
    $cliente = User::find($idCliente);
		$factura = Factura::find($idFactura);
		$valorTotalPago = (int)$valorTotalPago;
		$N = (int)$N;
		if ($cliente == null) {
			dd("Ingrese un cliente válido");
		} else if ($factura == null){
			dd("Ingrese una factura válida");
		} else {
			$credito_actual = $cliente->credito_actual;
			echo "Credito actual : ".$credito_actual;
			echo "Valor total pago : ".$valorTotalPago;
	    if ($valorTotalPago <= $credito_actual) {
	      $totalPagar = self::numeroCuotas($N, $valorTotalPago, $idFactura);
				echo "Valor total a pagar : ".$totalPagar;
	      $factura->update(['valor_total' => $totalPagar]);
				$nuevo_credito_actual = $credito_actual - $valorTotalPago;
				try {
					$cliente->update(['credito_actual' => $nuevo_credito_actual]); // NO ESTÁ ACTUALIZANDO!!!!!!!!!!!
				} catch (\Exception $e) {
					dd("Error al actualizar credito_actual");
				}

	      //Revisar credito actual
				echo "nuevo_credito_actual ".$nuevo_credito_actual;
	      echo "Nuevo credito actual : ".$cliente->credito_actual;
				dd("compraCredito realizada");
	    } else {
	      dd("No tiene crédito");
	    }
		}
  }
}
