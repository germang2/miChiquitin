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
        //$search = Deuda::search();
        $deudas = Deuda::orderBy('created_at','desc')->search()->paginate(20);
        
        return view('cartera.reportes.reporte_deudas', compact('deudas'));
        
        
    }

    public function pagos_ultima_semana()
    {
        //
        $one_week_ago = Carbon::now()->subWeek(1)->toDateString();
        $deudas = Deuda::orderBy('created_at','desc')->whereDate('created_at','>=',$one_week_ago)->search()->paginate(20);
      
        return view('cartera.reportes.pagos_ultima_semana', compact('deudas'));

    }

    public function pagos_ultimo_mes()
    {
        //
        $one_month_ago = Carbon::now()->subMonth(1)->toDateString();
        $deudas = Deuda::orderBy('created_at','desc')->whereDate('created_at','>=',$one_month_ago)->search()->paginate(20);
      
        return view('cartera.reportes.pagos_ultimo_mes', compact('deudas'));
        
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
