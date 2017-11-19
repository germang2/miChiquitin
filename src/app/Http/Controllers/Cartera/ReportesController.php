<?php

namespace App\Http\Controllers\Cartera;

use App\Models\Cartera\Reportes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

use App\Models\Cartera\Plan_de_pago;
use App\Models\Usuarios\User;
use App\Models\Facturacion\Factura;
use App\Models\Usuarios\Cliente;
use App\Models\Cartera\Deuda;
use App\Models\Cartera\Pago;

use Session;
use Carbon\carbon;
use PDF;

class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cartera.reportes.index');
        
    }

    public function reporte_deudas()
    {
        //
        $doc = Input::get('search');
        
        if(is_null($doc)){
          $deudas = Deuda::orderBy('created_at','desc')->get();
        }else{
          $user_id = User::where('id_tipo',$doc)->first()->id;
          $deudas = Deuda::where('id_usuario',$user_id)->orderBy('created_at','desc')->get();
          
        }

        $total_pagar = 0;
        $total_pagado = 0;
        foreach ($deudas as $deuda) {
          # code...
          $total_pagar += $deuda->valor_a_pagar;
          $total_pagado += $deuda->valor_pagado;
        }
        return view('cartera.reportes.reporte_deudas', compact('deudas','total_pagar','total_pagado'));
        
        
    }

    public function pagos_ultima_semana()
    {
        //
        $doc = Input::get('search');
        $one_week_ago = Carbon::now()->subWeek(1)->toDateString();

        if(is_null($doc)){
          //Pagos en orden de creacion descendente y efectuados en la ultima semana
          $pagos = Pago::orderBy('created_at','desc')->whereDate('created_at','>=',$one_week_ago)->get();
        }else{
          $user_id = User::where('id_tipo',$doc)->first()->id;
          //Pagos pertenecientes a un usuario efectuados en la ultima semana
          $data = User::whereId($user_id)->with('deuda.pagos')->get();
          $pagos = $data[0]->deuda->pagos->where('created_at','>=',$one_week_ago);
          //dd($pagos);
        }
        
        $total_pagado = 0;
        foreach ($pagos as $pago) {
          # code...
          $total_pagado += $pago->valor;
        }
      
        return view('cartera.reportes.pagos_ultima_semana', compact('pagos','total_pagado'));

    }

    public function pagos_ultimo_mes()
    {
        //
        $doc = Input::get('search');
        $one_month_ago = Carbon::now()->subMonth(1)->toDateString();

        if(is_null($doc)){
          //Pagos en orden de creacion descendente y efectuados en la ultima semana
          $pagos = Pago::orderBy('created_at','desc')->whereDate('created_at','>=',$one_month_ago)->get();;
        }else{
          $user_id = User::where('id_tipo',$doc)->first()->id;
          //Pagos pertenecientes a un usuario efectuados en la ultima semana
          $data = User::whereId($user_id)->with('deuda.pagos')->get();
          $pagos = $data[0]->deuda->pagos->where('created_at','>=',$one_month_ago);
          //dd($pagos);
        }

        $total_pagado = 0;
        foreach ($pagos as $pago) {
          # code...
          $total_pagado += $pago->valor;
        }
      
        return view('cartera.reportes.pagos_ultimo_mes', compact('pagos','total_pagado'));
        
    }

    public function downloadPDF($id = null)
    {
      $data_key = substr($id,0,1);
      $user_key = substr($id,1,strlen($id));
      $one_week_ago = Carbon::now()->subWeek(1)->toDateString();
      $one_month_ago = Carbon::now()->subMonth(1)->toDateString();
      //dd($data_key,$user_key);

      if (strlen($user_key) == 0){
        //dd('No user');
        $deudas = Deuda::orderBy('created_at','desc')->get();
        $pdf = PDF::loadView('cartera.reportes.pdf', compact('deudas'));
        return $pdf->stream('reporte_'.Carbon::now().'.pdf');
      }else{
        $user = User::find($user_key);
        switch ($data_key) {
          case "d"://deuda
              $deudas = Deuda::where('id_usuario',$user_key)->orderBy('created_at','desc')->get();
              $pdf = PDF::loadView('cartera.reportes.pdf', compact('deudas'));
              return $pdf->stream('reporte_'.$user->name.'_'.Carbon::now().'.pdf');
              break;
          case "w"://week
              
              $deudas = Deuda::orderBy('created_at','desc')->whereDate('created_at','>=',$one_week_ago)
                ->search($user_key)->paginate(20);
              $pdf = PDF::loadView('cartera.reportes.pdf', compact('deudas'));
              return $pdf->stream('reporte_'.$user->name.'_'.Carbon::now().'.pdf');
              break;
          case "m"://month
              
              $deudas = Deuda::orderBy('created_at','desc')->whereDate('created_at','>=',$one_month_ago)
                ->search($user_key)->paginate(20);
              $pdf = PDF::loadView('cartera.reportes.pdf', compact('deudas'));
              return $pdf->stream('reporte_'.$user->name.'_'.Carbon::now().'.pdf');
              break;
        }
        //dd($data_key);
      }
    }

}
