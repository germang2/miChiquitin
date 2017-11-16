<?php

namespace App\Http\Controllers\Inventario;
use App\Http\Controllers\Controller;

use App\Models\Inventario\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function eliminar()
    {
        //borrado = 2 means it is available
        $eliminar_proveedor = DB::table('proveedores')->select('id', 'representante_legal')->where('borrado', '=', 2)->get();

        return view('Inventario/eliminar_proveedor',['proveedores' => $eliminar_proveedor]);
    }

    public function update(Request $request)
    {
        //function to flag a proveedor as erased
        $proveedor = Proveedor::find($request->id_eliminar_proveedor);

        $proveedor->borrado = 1;
        
        $proveedor->save();
        return $this->proveedores();

    }
    //-------------------------------------------------------------------------------------------------------//
    public function actualizar()
    {
        //borrado = 2 means it is available
        $actualizar_proveedor = DB::table('proveedores')->select('id', 'representante_legal')->where('borrado', '=', 2)->get();

        return view('Inventario/actualizar_proveedor',['proveedores' => $actualizar_proveedor]);
    }


    public function actualizar_form(Request $request)
    {
        //borrado = 2 means it is available
        $actualizar_proveedor_form = $request->id_actualizar_proveedor;
        $proveedor = DB::table('proveedores')->where('id', $actualizar_proveedor_form)->get();         
        
        return view('Inventario/actualizar_proveedor_form',['proveedor' => $proveedor]);
    }

    public function update_actualizar(Request $request)
    {
        //function to flag a proveedor as erased
        $proveedor = Proveedor::find($request->id);

        $proveedor->id_tipo = $request->id_tipo;
        $proveedor->representante_legal = $request->representante_legal;
        $proveedor->id_representante = $request->id_representante_legal;
        $proveedor->telefono = $request->telefono;
        $proveedor->razon_social = $request->razon_social;
        $proveedor->per_jur = $request->per_jur;
        $proveedor->departamento = $request->departamento;
        $proveedor->direccion = $request->direccion;
        $proveedor->ciudad = $request->ciudad;

        $proveedor->save();

        return $this->proveedores();

    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function proveedores()
    {
        //esta funcion me llevara a la vista de proveedores

        $proveedores = DB::table('proveedores')->where('borrado', '=', 2)->get();

        return view('Inventario/proveedores', ['proveedores' => $proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function agregar()
    {
        return view('Inventario/agregar_proveedor');
    }

    public function agregarProveedor(Request $request)
    {
        $id_tipo = $request->idTipo;
        $representante_legal = $request->representanteLegal;
        $id_representante = $request->idRepresentante;
        $fecha = $request->fecha;
        $telefono = $request->telefono;
        $razon_social = $request->razonSocial;
        $per_jur = $request->perJur;
        $departamento = $request->departamento;
        $direccion = $request->direccion;
        $ciudad = $request->ciudad;

        Proveedor::create(
            ['id_tipo' => $id_tipo, 
            'representante_legal' => $representante_legal, 
            'id_representante' => $id_representante, 
            'fecha' => $fecha, 
            'telefono' => $telefono, 
            'razon_social' => $razon_social, 
            'per_jur'  => $per_jur, 
            'departamento' => $departamento, 
            'direccion' => $direccion, 
            'borrado' => '2',
            'ciudad' => $ciudad,]
        );
        return $this->proveedores();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function show(proveedores $proveedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function edit(proveedores $proveedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(proveedores $proveedores)
    {
        //
    }
}
