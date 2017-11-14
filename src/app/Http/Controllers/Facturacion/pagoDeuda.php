<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facturacion\Factura;
use App\Models\Facturacion\FacturaDeuda;
use App\Models\Cartera\Deuda;
use App\Models\Cartera\Pago;
use Carbon\Carbon;

class pagoDeuda extends Controller
{
  public function pagar($idFactura, $abono){
    $abono = (int)$abono;
    $idFactura = (int)$idFactura;
    $factura = Factura::find($idFactura);
    $deuda = Deuda::where("id_factura", $idFactura)->get();

    if ($factura == null) {
      dd("ID de la Factura no válida.");
    } else {
      $valor_cuota = $factura->valor_cuota;
      $valor_restante = $deuda[0]->valor_a_pagar;
      if ($valor_restante == 0) {
        dd("La Factura ya esta paga, este es el id: ", $idFactura);
      } else {
        if ($abono >= $valor_cuota && $abono <= $valor_restante) {
          $full_date = Carbon::now('America/Bogota');
          $date = Carbon::now('America/Bogota')->format('Y-m-d');
          $time = $full_date->toTimeString();

          $nueva_entrada = [
            'id_factura' => $idFactura,
            'abono' => $abono,
            'fecha' => $date,
            'hora' => $time
          ];
          $entrada_pago = [
            'id_pago' => '',
            'id_deuda' => $deuda[0]->id_deuda,
            'valor' => $abono
          ];
          Deuda::where('id_factura', $idFactura)->update([
            'valor_pagado' => $deuda[0]->valor_pagado + $abono,
            'valor_a_pagar' => $deuda[0]->valor_a_pagar - $abono
          ]);

          if ($deuda->valor_a_pagar == 0) {
            Factura::where('id_factura', $idFactura)->update([
              'estado' => 'cancelado',
            ]);

            Deuda::where('id_factura', $idFactura)->update([
              'estado' => 'cancelado',
            ]);
          }

          Pago::create($entrada_pago);
          FacturaDeuda::create($nueva_entrada);
          dd("Se ha realizado un abono de ", $abono);
        } elseif ($valor_cuota > $valor_restante) {
          $full_date = Carbon::now('America/Bogota');
          $date = Carbon::now('America/Bogota')->format('Y-m-d');
          $time = $full_date->toTimeString();
          $devolucion = $abono - $valor_restante;
          $nueva_entrada = [
            'id_factura' => $idFactura,
            'abono' => $valor_restante,
            'fecha' => $date,
            'hora' => $time
          ];
          $entrada_pago = [
            'id_pago' => '',
            'id_deuda' => $deuda[0]->id_deuda,
            'valor' => $valor_restante
          ];
          Deuda::where('id_factura', $idFactura)->update([
            'valor_pagado' => $deuda[0]->valor_pagado + $valor_restante,
            'valor_a_pagar' => $deuda[0]->valor_a_pagar - $valor_restante
          ]);
          Pago::create($entrada_pago);
          FacturaDeuda::create($nueva_entrada);

          if ($deuda->valor_a_pagar == 0) {
            Factura::where('id_factura', $idFactura)->update([
              'estado' => 'cancelado',
            ]);

            Deuda::where('id_factura', $idFactura)->update([
              'estado' => 'cancelado',
            ]);
          }

          echo "Le sobra al cliente ".$devolucion;
          dd("Se ha realizado un abono de ", $valor_restante);
        } else {
          dd("Debe pagar un monto mayor o igual a ", $valor_cuota);
        }
      }
    }
  }
}
