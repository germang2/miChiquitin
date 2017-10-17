<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuarios\User;

class FacturaController extends Controller
{
    // public function crearFactura($idVendedor, $idCliente, $valorTotalPago) {
    //   $flag = False;
    //   $flag = self::compraCredito($idCliente, $valorTotalPago);
    //   if ($flag) {
    //     self::numeroCuotas();
    //   } else {
    //     return view('error');
    //   }
    // }
    //
    // public function identificar($idVendedor) {
    //   // dd($idVendedor,$idCliente);
    // }

    public function numeroCuotas($N, $valorTotalCompra, $idFactura) {
      $factura = Factura::find($idFactura);
      $valorTotalCompra = $valorTotalCompra + ($valorTotalCompra * 0.05);
      $nuevoValorTotalCompra = $valorTotalCompra - ($valorTotalCompra * 0.10);
      $factura->update(['cuotas' => $N]);
      $factura->update(['valor_cuota' => ($valorTotalCompra - $nuevoValorTotalCompra) / $N]);

      return $nuevoValorTotalCompra;
    }

    public function compraCredito($idCliente, $valorTotalPago, $N, $idFactura) {
      $cliente = User::find($idCliente);
      $factura = Factura::find($idFactura);
      $credito_actual = $cliente->credito_actual;
      if ($valorTotalPago <= $credito_actual) {
        $totalPagar = self::numeroCuotas($N, $valorTotalPago,$idFactura);
        $factura->update(['valor_total' => $totalPagar]);
        dd($totalPagar);
      } else {
        dd("No tiene crédito");
      }
    }
}
