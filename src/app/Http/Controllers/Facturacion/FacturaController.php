<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Usuarios\Cliente;

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

    public function numeroCuotas($N, $valorTotalCompra) {
      $valorTotalCompra = $valorTotalCompra + ($valorTotalCompra * 0.05);
      $nuevoValorTotalCompra = $valorTotalCompra - ($valorTotalCompra * 0.10);
      return $nuevoValorTotalCompra / $N;
    }

    public function compraCredito($idCliente, $valorTotalPago, $N, $idFactura) {
      $cliente = Cliente::find($idCliente);
      $factura = Factura::find($idFactura);
      $credito_maximo = $cliente->credito_maximo;
      if ($valorTotalPago < $credito_maximo) {
        $totalPagarCuotas = self::numeroCuotas($N, $valorTotalPago);
        $factura->update(['cuotas' => $N]);
        $factura->update(['valor_cuota' => $totalPagarCuotas]);
        // se modifica 'valor_total' ?
        dd($totalPagarCuotas);
      } else {
        dd("No tiene crédito");
      }
    }
}
