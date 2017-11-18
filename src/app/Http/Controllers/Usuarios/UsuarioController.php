<?php

namespace App\Http\Controllers\Usuarios;
use App\Models\Usuarios\User;
//use App\Models\Usuarios\Session;
use App\Models\Usuarios\Cliente;
use App\Models\Usuarios\Empleado;
use App\Models\Usuarios\Contrato;
use App\Models\Usuarios\Telefono;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
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
      $v = \Validator::make($request->all(), [
          'name' => 'required',
          'apellidos' => 'required',
          'email'    => 'required|email|unique:users',
          'telefono' => 'required|numeric|min:7',
      ]);
      if ($v->fails())
      {
        Session::flash('flash_message', 'Busqueda no encotrada   ');
        return redirect()->back();
      }else{
      $user = User::where('name',$request->name)->first();
      return redirect()->route('Usuario.show',['usuario'=>$user->id]);
    }
    }

    public function acceso(Request $request){   //acceso users
      $user =  User::all()->where('last_login','!=',null );
     //var_dump($user);
     return view('usuario.filtros.IndexAcceso',['users'=>$user]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function indextrash(){
        $user = User::onlyTrashed()->paginate(10);
        return view('usuario.user.Indextrash')->with(['users'=>$user]);
    }

    public function restore($id)
    {
          $user = User::withTrashed()->where('id', '=', $id)->first();
          if($user->tipo_rol == 'cliente'){
            $cliente = Cliente::withTrashed()->where('id_usuario',$id)->firstOrFail();
            $telefono= Telefono::withTrashed()->findOrFail($user->id);
            $user->restore();
            $cliente->restore(); //agregar sofdelete
            $telefono->restore();
          }
          if($user->tipo_rol=='empleado'){
            $empleado=Empleado::withTrashed()->where('id_usuario',$user->id)->firstOrFail();
            $contrato=Contrato::withTrashed()->findOrFail($empleado->id_contrato);
            $telefono= Telefono::withTrashed()->findOrFail($user->id);
            $user->restore();
            $contrato->restore();
            $telefono->restore();
            $empleado->restore();
          }
          Session::flash('flash_message', 'Usuario Restaurado');
          return redirect()->route('Usuario.index');
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

    public function destroy($id)
    {
      $user = User::findOrFail($id);
      if($user->tipo_rol == 'cliente'){
        $cliente = Cliente::where('id_usuario',$id)->firstOrFail();
        $telefono= Telefono::findOrFail($user->id);
        $cliente->delete(); //agregar sofdelete
        $user->delete();
        $telefono->delete();
      }
      if($user->tipo_rol=='empleado'){
        $empleado=Empleado::where('id_usuario',$user->id)->firstOrFail();
        $contrato=Contrato::findOrFail($empleado->id_contrato);
        $telefono= Telefono::findOrFail($user->id);
        $empleado->delete();
        $contrato->delete();
        $user->delete();
        $telefono->delete();
      }
      Session::flash('deleted', 'Usuario Eliminado');
      return redirect()->route('Usuario.index')->with("deleted" , $id );
    }
}
