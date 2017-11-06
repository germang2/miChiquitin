<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuarios\User;
use App\Models\Facturacion\Factura;
use Carbon\Carbon;

class MetodoDePago extends Controller
{
	public function metodoPago($metodo, $valorTotal, $idCliente, $idVendedor, $N){
		if ($metodo == "efectivo"){
			$totalFactura = $valorTotal - ($valorTotal*0.05);

			return $totalFactura;
		}

		if ($metodo == "credito") {
			self::compraCredito($idVendedor, $idCliente, $valorTotal, $N);
		}
	}


  public function numeroCuotas($N, $valorTotalCompra) {
    $valorTotalCompra = $valorTotalCompra + ($valorTotalCompra * 0.05);
    $valorPagar = $valorTotalCompra * 0.10;
    return  [
			'valorCuota' => ($valorTotalCompra - $valorPagar) / $N,
			'valorPagar' => $valorPagar
		];
  }

  public function compraCredito($idVendedor, $idCliente, $valorTotalPago, $N) {
    $cliente = User::find($idCliente);
		$valorTotalPago = (int)$valorTotalPago;
		$N = (int)$N;
		$idVendedor = (int)$idVendedor;
		if ($cliente == null) {
			dd("Ingrese un cliente válido");
		} else {
			$credito_actual = $cliente->credito_actual;
			echo "Credito actual : ".$credito_actual;
			echo "<br>Valor total pago : ".$valorTotalPago;

			if ($valorTotalPago <= $credito_actual) {
	      $obj = self::numeroCuotas($N, $valorTotalPago);
				echo "<br>Valor total a pagar : ".$obj["valorPagar"];
				$nuevo_credito_actual = $credito_actual - $valorTotalPago;

				$cliente->credito_actual = $nuevo_credito_actual;
				$cliente->save();

				$idPlanPago = 0;
				if ($N == 1) $idPlanPago = 2;
				if ($N == 3) $idPlanPago = 3;
				if ($N == 6) $idPlanPago = 4;

				echo "<br>idPlanPago: ".$idPlanPago;

				$factura = [
          'fecha' => Carbon::now('America/Bogota'),
					'id_cliente' => $idCliente,
					'id_plan_pago' => $idPlanPago,
					'cuotas' => $N,
					'valor_cuota' => $obj["valorCuota"],
					'id_vendedor' => $idVendedor,
					'valor_total' => $obj["valorPagar"],
					'estado' => 'pendiente'
        ];

        Factura::create($factura);

	      // // //Revisar credito actual
				echo "<br>nuevo_credito_actual: ".$nuevo_credito_actual;
	      echo "<br>Nuevo credito actual(cliente): ".$cliente->credito_actual;
				dd("compraCredito realizada");
	    } else {
	      dd("No tiene crédito");
	    }
		}
  }
}
