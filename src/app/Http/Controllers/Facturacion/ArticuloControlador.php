<?php

namespace App\Http\Controllers\Facturacion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Inventario\Articulo;
use App\Models\Facturacion\FacturaProducto;

class ArticuloControlador extends Controller
{
  public function EliminarArticulo($id, $cantidadActual, $cantidadEliminar) {

    if($cantidadEliminar < $cantidadActual) {

      $articuloFactura = FacturaProducto::where("id", $id)->get();
      $CantidadFactura = $cantidadActual - $cantidadEliminar;
      FacturaProducto::where("id", $id)->update(['cantidad' => $CantidadFactura]);

      $idArticulo = $articuloFactura[0]->id_articulo;

      $articuloInventario = Articulo::where('id', $idArticulo)->get();
      $CantidadInventario = $articuloInventario[0]->cantidad + $cantidadEliminar;
      Articulo::where("id", $idArticulo)->update(['cantidad' => $CantidadInventario]);

      echo "Producto eliminado!!!";

    }

    if($cantidadEliminar >= $cantidadActual) {

      $articuloFactura = FacturaProducto::where("id", $id)->get();
      $idArticulo = $articuloFactura[0]->id_articulo;
      $articuloFactura->delete();

      $articuloInventario = Articulo::where('id', $idArticulo)->get();
      $CantidadInventario = $articuloInventario[0]->cantidad + $cantidadEliminar;
      Articulo::where("id", $idArticulo)->update(['cantidad' => $CantidadInventario]);


      echo "Factura modificada!!!";
    }
  }

  public function CancelarCompra($idFactura) {

    $articulosFactura = FacturaProducto::where("id_factura", $idFactura)->get();
    foreach ($articulosFactura as $articulo) {
      $idArticulo = $articulo->id_articulo;
      $cantidadEliminar = $articulo->cantidad;
      $articulo->delete();

      $articuloInventario = Articulo::where('id', $idArticulo)->get();
      $CantidadInventario = $articuloInventario[0]->cantidad + $cantidadEliminar;
      Articulo::where("id", $idArticulo)->update(['cantidad' => $CantidadInventario]);

    }
    echo "Compra cancelada!!!";
  }
}
