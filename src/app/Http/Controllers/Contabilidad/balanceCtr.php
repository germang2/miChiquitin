<?php

namespace App\Http\Controllers\Contabilidad;

use App\Models\Contabilidad\nomina;
use App\Models\Contabilidad\pagoProveedores;
use App\Models\Inventario\Pedido;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vinkla\Hashids\Facades\Hashids;

class balanceCtr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $tipo = $request->input('tipo');
        switch ($tipo) {
            case 'dia':
                $dt = Carbon::now();
                $dt = $dt->format('Y-m-d');
                $format = 'yyyy-mm-dd';
                $min = 0;

                break;
            case 'mes':
                $dt = Carbon::now();
                $dt = $dt->format('Y-m');
                $format = 'yyyy-mm';
                $min = 1;

                break;

            case 'an':
                $dt = Carbon::now();
                $dt = $dt->format('Y');
                $format = 'yyyy';
                $min = 2;

                break;
            default:
                abort('404');
                break;
        }
        return view('Contabilidad.balances')->with(
            [
                'date'=> $dt,
                'format' => $format,
                'min'=> $min
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'balance';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
