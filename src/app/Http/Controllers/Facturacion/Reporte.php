<?php

namespace App\Http\Controllers\Facturacion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facturacion\FacturaProducto;
use App\Models\Facturacion\Factura;
use App\Models\Inventario\Articulo;

class Reporte extends Controller
{
    
	public function index(){
		$productos = Articulo::all();
		return view('Facturacion.Reportes')->with('articulos', $productos);
	}

	public function reporte(Request $filtro){

		$productos = Articulo::all();


		#ESTE FILTRO ES POR SI NO SELECCIONAN NADA
		if($filtro->id_cliente == null and $filtro->fecha == null and $filtro->type == "vacio" and $filtro->estado == "vacio" and count($filtro->productos) == 0){
			$facturas = factura::all();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES SOLO PARA ID DE CLIENTE
		if($filtro->id_cliente != null and $filtro->fecha == null and $filtro->type == "vacio" and $filtro->estado == "vacio" and count($filtro->productos) == 0){
			$facturas = factura::where('id_cliente', $filtro->id_cliente)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ID DE CLIENTE Y FECHA
		if($filtro->id_cliente != null and $filtro->fecha != null and $filtro->type == "vacio" and $filtro->estado == "vacio" and count($filtro->productos) == 0){
			$facturas = factura::where('id_cliente', $filtro->id_cliente)->where('fecha', $filtro->fecha)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ID DE CLIENTE Y METODO DE PAGO
		if($filtro->id_cliente != null and $filtro->fecha == null and $filtro->type != "vacio" and $filtro->estado == "vacio" and count($filtro->productos) == 0){
			$facturas = factura::where('id_cliente', $filtro->id_cliente)->where('id_plan_pago', $filtro->type)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ID DE CLIENTE Y ESTADO
		if($filtro->id_cliente != null and $filtro->fecha == null and $filtro->type == "vacio" and $filtro->estado != "vacio" and count($filtro->productos) == 0){
			$facturas = factura::where('id_cliente', $filtro->id_cliente)->where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ID DE CLIENTE Y ARTICULOS
		if($filtro->id_cliente != null and $filtro->fecha == null and $filtro->type == "vacio" and $filtro->estado == "vacio" and count($filtro->productos) > 0){
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->where('id_cliente', $filtro->id_cliente)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ID DE CLEINTES, FECHA  Y METODO DE PAGO
		if($filtro->id_cliente != null and $filtro->fecha != null and $filtro->type != "vacio" and $filtro->estado == "vacio" and count($filtro->productos) == 0){
			$facturas = factura::where('id_cliente', $filtro->id_cliente)->where('fecha', $filtro->fecha)->where('id_plan_pago', $filtro->type)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ID DE CLEINTES, FECHA Y ESTADO
		if($filtro->id_cliente != null and $filtro->fecha != null and $filtro->type == "vacio" and $filtro->estado != "vacio" and count($filtro->productos) == 0){
			$facturas = factura::where('id_cliente', $filtro->id_cliente)->where('fecha', $filtro->fecha)->where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ID DE CLIENTES, FECHA Y ARTICULOS
		if($filtro->id_cliente != null and $filtro->fecha != null and $filtro->type == "vacio" and $filtro->estado == "vacio" and count($filtro->productos) > 0){
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->where('id_cliente', $filtro->id_cliente)->where('fecha', $filtro->fecha)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ID DE CLEINTES, METODO DE PAGO Y ESTADO
		if($filtro->id_cliente != null and $filtro->fecha == null and $filtro->type != "vacio" and $filtro->estado != "vacio" and count($filtro->productos) == 0){
			$facturas = factura::where('id_cliente', $filtro->id_cliente)->where('id_plan_pago', $filtro->type)->where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ID DE CLIENTES, METODO DE PAGO Y ARTICULOS
		if($filtro->id_cliente != null and $filtro->fecha == null and $filtro->type != "vacio" and $filtro->estado == "vacio" and count($filtro->productos) > 0){
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->where('id_cliente', $filtro->id_cliente)->where('id_plan_pago', $filtro->type)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE METODO ES CON ID DE CLEINTES, ESTADO Y ARTICULOS
		if($filtro->id_cliente != null and $filtro->fecha == null and $filtro->type == "vacio" and $filtro->estado != "vacio" and count($filtro->productos) > 0){
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->where('id_cliente', $filtro->id_cliente)->where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ID DE CLIENTES, FECHA, METODO DE PAGO Y ESTADO
		if($filtro->id_cliente != null and $filtro->fecha != null and $filtro->type != "vacio" and $filtro->estado != "vacio" and count($filtro->productos) == 0){
			$facturas = factura::where('id_cliente', $filtro->id_cliente)->where('fecha', $filtro->fecha)->where('id_plan_pago', $filtro->type)->where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ID DE CLIENTES, FECHA, METODO DE PAGO Y ARTICULOS
		if($filtro->id_cliente != null and $filtro->fecha != null and $filtro->type != "vacio" and $filtro->estado == "vacio" and count($filtro->productos) > 0){
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->where('id_cliente', $filtro->id_cliente)->where('id_plan_pago', $filtro->type)->where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ID DE CLIENTES, FECHA, METODO DE PAGO, ESTADO Y ARTICULOS
		if($filtro->id_cliente != null and $filtro->fecha != null and $filtro->type != "vacio" and $filtro->estado != "vacio" and count($filtro->productos) > 0){
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->where('id_cliente', $filtro->id_cliente)->where('id_plan_pago', $filtro->type)->where('estado', $filtro->estado)->where('fecha', $filtro->fecha)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}



		#ESTE FILTRO ES CON LA FECHA
		if($filtro->id_cliente == null and $filtro->fecha != null and $filtro->type == "vacio" and $filtro->estado == "vacio" and count($filtro->productos) == 0) {
			$facturas = factura::where('fecha', $filtro->fecha)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON LA FECHA Y EL METODO DE PAGO
		if($filtro->id_cliente == null and $filtro->fecha != null and $filtro->type != "vacio" and $filtro->estado == "vacio" and count($filtro->productos) == 0){
			$facturas = factura::where('fecha', $filtro->fecha)->where('id_plan_pago', $filtro->type)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON LA FECHA Y EL ESTADO
		if($filtro->id_cliente == null and $filtro->fecha != null and $filtro->type == "vacio" and $filtro->estado != "vacio" and count($filtro->productos) == 0){
			$facturas = factura::where('fecha', $filtro->fecha)->where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON LA FECHA Y ARTICULOS
		if($filtro->id_cliente == null and $filtro->fecha != null and $filtro->type == "vacio" and $filtro->estado == "vacio" and count($filtro->productos) > 0){
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->where('fecha', $filtro->fecha)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON LA FECHA, METODO DE PAGO Y ESTADO 
		if($filtro->id_cliente == null and $filtro->fecha != null and $filtro->type != "vacio" and $filtro->estado != "vacio" and count($filtro->productos) == 0){
			$facturas = factura::where('fecha', $filtro->fecha)->where('id_plan_pago', $filtro->type)->where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON LA FECHA,METODO DE PAGO Y ARTICULOS
		if($filtro->id_cliente == null and $filtro->fecha != null and $filtro->type != "vacio" and $filtro->estado == "vacio" and count($filtro->productos) > 0){
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->where('fecha', $filtro->fecha)->where('id_plan_pago', $filtro->type)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON LA FECHA, ESTADO Y ARTICULOS
		if($filtro->id_cliente == null and $filtro->fecha != null and $filtro->type == "vacio" and $filtro->estado != "vacio" and count($filtro->productos) > 0){
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->where('fecha', $filtro->fecha)->where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}


		#ESTE FILTRO ES CON METODO DE PAGO
		if($filtro->id_cliente == null and $filtro->fecha == null and $filtro->type != "vacio" and $filtro->estado == "vacio" and count($filtro->productos) == 0) {
			$facturas = factura::where('id_plan_pago', $filtro->type)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON METODO DE PAGO Y ESTADO
		if($filtro->id_cliente == null and $filtro->fecha == null and $filtro->type != "vacio" and $filtro->estado != "vacio" and count($filtro->productos) == 0){
			$facturas = factura::where('id_plan_pago', $filtro->type)->where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON METODO DE PAGO Y ARTICULOS
		if($filtro->id_cliente == null and $filtro->fecha == null and $filtro->type != "vacio" and $filtro->estado == "vacio" and count($filtro->productos) > 0){
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->where('id_plan_pago', $filtro->type)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON METODO DE PAGO, ESTADO Y ARTICULOS
		if($filtro->id_cliente == null and $filtro->fecha == null and $filtro->type != "vacio" and $filtro->estado != "vacio" and count($filtro->productos) > 0){
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->where('id_plan_pago', $filtro->type)->where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}


		#ESTE FILTRO ES CON ESTADO
		if($filtro->id_cliente == null and $filtro->fecha == null and $filtro->type == "vacio" and $filtro->estado != "vacio" and count($filtro->productos) == 0) {
			$facturas = factura::where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}
		#ESTE FILTRO ES CON ESTADO Y ARTICULOS
		if($filtro->id_cliente == null and $filtro->fecha == null and $filtro->type == "vacio" and $filtro->estado != "vacio" and count($filtro->productos) > 0){
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->where('estado', $filtro->estado)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}


		#ESTE FILTRO ES CON LOS ARTICULOS
		if($filtro->id_cliente == null and $filtro->fecha == null and $filtro->type == "vacio" and $filtro->estado == "vacio" and count($filtro->productos) > 0) {
			$fac = FacturaProducto::whereIN('id_articulo',  $filtro->productos)->select("id_factura")->get()->toArray();
			$facturas = Factura::whereIN('id', $fac)->get();
			return view('Facturacion.Reportes')->with('facturas', $facturas)->with('articulos', $productos);
		}

		
		return view('Facturacion.Reportes')->with('articulos', $productos);
	}

	public function reporte_detalle(Request $filtro){
		$factura_detalles = FacturaProducto::where('id_factura', $filtro->detalles)->get();
		
		return view('Facturacion.ReporteDetalle')-> with('datos', $factura_detalles);
		
	}


}
