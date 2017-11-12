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
        $deudas = Deuda::all();
        
        return view('cartera.reportes.reporte_deudas', compact('deudas'));
        
    }

    public function pagos_ultima_semana()
    {
        //
        return view('cartera.reportes.pagos_ultima_semana');
        
    }

    public function pagos_ultimo_mes()
    {
        //
        return view('cartera.reportes.pagos_ultimo_mes');
        
    }

}
