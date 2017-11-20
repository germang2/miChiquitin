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
        ->select('f.id_factura','pp.id_plan_de_pago','pp.nombre_plan')
        ->groupBy('f.id_plan_pago')
        ->orderBy(\DB::raw('count(f.id_plan_pago)', 'desc'))
        ->get();
        //->paginate(7);
        return view('cartera.consultas.planes',["plan" => $plan]);
    }

    public function mayor(){
        $fecha=Pago::all();
        $fecha->groupBy('id_deuda');  
        //$group->toArray();
        //->sum(\DB::raw('SUM(valor) as sumatotal'))->sortByDesc('sumatotal');
        //$fecha=DB::table('pagos')
        //->select('id_deuda',DB::raw('SUM(valor) as sumatotal'),'created_at')
        //->groupBy('created_at')
        //->orderBy('sumatotal','desc')
        //->paginate(5);
        return view('cartera.consultas.mayor',['fecha' => $fecha,]);
    } 

    public function mdeudas(){
        $deudas=Deuda::all()->sortByDesc('valor_a_pagar');
        return view('cartera.consultas.mdeudas',['deudas' => $deudas]);     
    }
}