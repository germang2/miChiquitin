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
        $deudas = Deuda::orderBy('created_at','desc')->search()->paginate(20);
        return view('cartera.reportes.reporte_deudas', compact('deudas'));
        
    }

    public function pagos_ultima_semana()
    {
        //
        $one_week_ago = Carbon::now()->subWeek(1)->toDateString();
        $deudas = Deuda::orderBy('created_at','desc')->whereDate('created_at','>=',$one_week_ago)->orderBy('created_at')->search()->paginate(20);
      
        return view('cartera.reportes.pagos_ultima_semana', compact('deudas'));

    }

    public function pagos_ultimo_mes()
    {
        //
        $one_month_ago = Carbon::now()->subMonth(1)->toDateString();
        $deudas = Deuda::orderBy('created_at','desc')->whereDate('created_at','>=',$one_month_ago)->orderBy('created_at')->search()->paginate(20);
      
        return view('cartera.reportes.pagos_ultimo_mes', compact('deudas'));
        
    }

}
