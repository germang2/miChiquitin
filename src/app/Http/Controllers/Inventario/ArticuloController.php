<?php

namespace App\Http\Controllers\Inventario;
use App\Http\Controllers\Controller;

use App\Models\Inventario\Articulo;
use App\Models\Inventario\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proveedor = Proveedor::select('id','representante_legal')->where('borrado','=',2)->get(); 
        $data = Articulo::where('borrado', '=', 2)->orderby('cantidad')->paginate(10);
        return view('Inventario\articulos', compact('data','proveedor'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function sendMessage(Request $request)
    {
      $user = Auth::user();

      $message = $user->messages()->create([
        'message' => $request->input('message')
      ]);

      broadcast(new MessageSent($message,$user))->toOthers();

      return ['status' => 'Message Sent!'];
    }
    public function create()
    {
        //$proveedor = Class::Proveedor();

        $id_proveedor = DB::table('proveedores')
                     ->select('id','representante_legal')
                     ->where('borrado', '=', 2)
                     ->get();
        return view('Inventario\agregar_articulo', compact('id_proveedor') );
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
        Articulo::create([
            'id' => $request->searchBar,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'precio_basico' => $request->precio_basico,
            'fecha' => $request->fecha,
            'id_proveedor' => $request->id_proveedor,
            'borrado' => '2',
        ]);    
  
        return $this->index();     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(Articulo $articulo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $Articulos =  DB::table('articulos')
                     ->select('*')
                     ->where('borrado','=',2)->get();                             
        return view('Inventario\actualizar_articulo', compact('Articulos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $Articulo = Articulo::find($request->id);

        $Articulo->Nombre = $request->Nombre;
        $Articulo->precio_basico = $request->precio_basico;
        //$Articulo->id_proveedor = $request->Proveedor;
        $Articulo->Cantidad = $request->Cantidad;        
        $Articulo->Descripcion = $request->Descripcion;

        $Articulo->save();

        return $this->index();
    }

    public function delete()
    {
        //
        $Articulos = DB::table('articulos')
                    ->select('id','nombre')
                    ->where('borrado', '=', 2)
                    ->get();
        return view('Inventario\eliminar_articulo', compact('Articulos'));
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $Articulo = Articulo::find($request->id);

        $Articulo->borrado = '1';
        
        $Articulo->save();

        return $this->index();

    }

    public function search(Request $request)
    {
        $terms = $request->term;
        $users = DB::table('articulos')
                     ->select('id')
                     ->where('id','LIKE','%'.$terms.'%')->get();
        if (count($users)==0) {
            $searchResult[] = 'Id Valida';
        }
        else{
            foreach ($users as $user => $value) {
                $searchResult[] = 'Id '.$value->id.' (No valida)';
            }
        }        
        return $searchResult;
    }    
}
