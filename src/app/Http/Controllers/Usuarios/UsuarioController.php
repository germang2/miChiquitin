<?php

namespace App\Http\Controllers\Usuarios;

use App\Models\Usuarios\User;
use App\Models\Usuarios\Cliente;
use App\Models\Usuarios\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    public function index()
    {
      $users = User::orderBy('id', 'desc')->paginate(10);
      return view('usuario.user.IndexUsers')->with(['users'=>$users]);
    }

    public function credito(){
      $users = User::where('credido_actual', 'pattern'); ///mirar this
    }

    public function name(Request $request){
      $user = User::where('name',$request->name)->first();
      return redirect()->route('Usuario.show',['usuario'=>$user->id]);
    }

    public function acceso(Request $request){   //acceso users

      var_dump($request->session()->all());
      //var_dump($request->session()->last_activity); si existiera una bd de ssesion php artisan session:table
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
          $usuario=User::findOrFail($id);
          return view('usuario.user.ShowUser',compact('usuario'));
    }

    public function edit($id)
    {
    $user=User::findOrFail($id);
    if($user->tipo_rol=='cliente'){
      $cliente = Cliente::where('id_usuario',$id)->firstOrFail();
      return redirect()->route('Cliente.edit',['cliente'=>$cliente->id_cliente]);
      }else{
      $Empleado = Empleado::where('id_usuario',$user->id)->firstOrFail();
    return redirect()->route('Empleado.edit',['empleado'=>$Empleado->id_empleado]);
      }
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
      $user->delete();
      return redirect()->route('Usuario.index');
    }
}
