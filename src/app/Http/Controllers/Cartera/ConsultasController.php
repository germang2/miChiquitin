<?php

namespace App\Http\Controllers\Cartera;

use Illuminate\Http\Request;
use App\Models\Facturacion\Factura;
use App\Http\Controllers\Controller;
use App\Models\Cartera\Plan_de_pago;
use App\Models\Cartera\Pago;
use App\Models\Cartera\Deuda;
use DB;

class ConsultasController extends Controller
{
    public function index(){
    	return view('cartera.consultas.index');
    }

    public function planes(){
    	$plan=DB::table('plan_de_pagos as pp')
    	->join('facturas as f','pp.id_plan_de_pago','=','f.id_plan_pago')
    	->where('f.id_plan_pago', '!=','1')
    	->select('f.id','pp.id_plan_de_pago','pp.nombre_plan')
    	->groupBy('f.id_plan_pago')
        ->orderBy(\DB::raw('count(f.id_plan_pago)', 'desc'))
        ->get();
        //->paginate(7);
    	return view('cartera.consultas.planes',["plan" => $plan]);
    }

    public function mayor(){
    	$fecha=DB::table('pagos')
    	->select('id_deuda',DB::raw('SUM(valor) as sumatotal'),'created_at')
    	->groupBy('created_at')
    	->orderBy('sumatotal','desc')
    	->paginate(5);
    	return view('cartera.consultas.mayor',['fecha' => $fecha]);
    } 

    public function mdeudas(){
     	$deudas=DB::table('deudas')
    	->select('id_deuda','valor_a_pagar','estado')
    	//->groupBy('created_at')
    	->orderBy('valor_a_pagar','desc')
    	->paginate(5);
    	return view('cartera.consultas.mdeudas',['deudas' => $deudas]);   	
    }
}
