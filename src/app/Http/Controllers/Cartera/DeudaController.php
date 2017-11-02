<?php

namespace App\Http\Controllers\Cartera;

use App\Models\Cartera\Deuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

use App\Models\Cartera\Plan_de_pago;
use App\Models\Usuarios\User;

class DeudaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $deudas = Deuda::all();

        return view('cartera.deuda.index', compact('deudas'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $planes = Plan_de_pago::pluck('nombre_plan','id_plan_de_pago');
        $usuarios = User::pluck('name','id');
        return view('cartera.deuda.create', compact('planes','usuarios'));
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
        $rules = array(
          'id_usuario' => 'required',
          'id_plan' => 'required',
          'id_factura' => 'required',
          'valor_pagado' => 'required',
          'valor_a_pagar' => 'required',
          'plazo_credito' => 'required',
          'estado' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
          return Redirect::to('cartera.deuda.create')
              ->withErrors($validator)
              ->withInput(Input::except('password'));
        } else {
            // store
            $deuda = new deuda;
            $deuda->id_usuario  = Input::get('id_usuario');
            $deuda->id_plan = Input::get('id_plan');
            $deuda->id_factura = Input::get('id_factura');
            $deuda->valor_pagado = Input::get('valor_pagado');
            $deuda->valor_a_pagar = Input::get('valor_a_pagar');
            $deuda->plazo_credito = Input::get('plazo_credito');
            $deuda->estado = Input::get('estado');
            $deuda->save();

            // redirect
            Session::flash('message', 'Successfully created deuda!');
            return Redirect::to('cartera.deuda');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cartera\Deuda  $deuda
     * @return \Illuminate\Http\Response
     */
    public function show(Deuda $deuda)
    {
        //
        $deuda = Deuda::find($id);

        return view('cartera.deuda.show', $deuda);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cartera\Deuda  $deuda
     * @return \Illuminate\Http\Response
     */
    public function edit(Deuda $deuda)
    {
        //
        $deuda = Deuda::find($id);

        return view('cartera.deuda.edit', $deuda);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cartera\Deuda  $deuda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deuda $deuda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cartera\Deuda  $deuda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deuda $deuda)
    {
        //
    }
}
