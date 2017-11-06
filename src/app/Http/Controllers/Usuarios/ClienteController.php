<?php

namespace App\Http\Controllers\Usuarios;

use App\Models\Usuarios\Cliente;
use App\Models\Usuarios\Telefono;
use App\Models\Usuarios\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    public function index()
    {
       $clientes = Cliente::orderBy('id_cliente', 'desc')->paginate(10);
       return view('usuario.clientes.IndexClientes', ['clientes'=>$clientes]);
    }

    public function create()
    {
      return view('usuario.clientes.CreateCliente');
    }

    public function store(Request $request)
    {
      $data = $request->all();
      $data['tipo_rol'] = 'cliente';
      $data['id_tipo'] = 3;
      $data['password'] = bcrypt('password123');
      $data['confirmation_password'] = bcrypt('password123');
      $Usuario= User::create($data);
      $data['id_usuario'] = $Usuario->id;
      $Cliente= Cliente::create($data);
      $Telefono= Telefono::create($data);
      return redirect()->route('Cliente.index');
    }

    public function show($id)
    {
      $cliente = Cliente::findOrFail($id); //primary id_cleinte
      return redirect()->route('Usuario.show',['usuario'=>$cliente->id_usuario]);
    }

    public function edit($id)
    {
      $cliente = Cliente::findOrFail($id);
      $usuario = User::findOrFail($cliente->id_usuario);
      $Telefono= Telefono::findOrFail($id);
      return view('usuario.clientes.EditCliente', ['cliente' => $cliente, 'usuario' => $usuario, 'telefono' => $Telefono]);
    }

    public function update (Request $request, $id) //incompleto
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update(){
          $request->all()
      };
      return redirect()->route('Cliente.show',['cliente'=>$cliente->id_cliente]);
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('Cliente.index');
    }
}
