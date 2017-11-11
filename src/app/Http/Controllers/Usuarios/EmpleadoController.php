<?php

namespace App\Http\Controllers\Usuarios;
use App\Models\Usuarios\User;
use App\Models\Usuarios\Contrato;
use App\Models\Usuarios\Empresa;
use App\Models\Usuarios\Telefono;
use App\Models\Usuarios\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Mail\enviar;
use Mail;

class EmpleadoController extends Controller
{

    public function index()
    {
        $empleados = Empleado::orderBy('id_empleado', 'desc')->paginate(10);
        return view('usuario.empleados.IndexEmpleados')->with(['Empleados'=>$empleados]);
    }

    public function create()
    {
      return view('usuario.empleados.CreateEmpleado');
    }

    public function store(Request $request)
    {
      $data = $request->all();
      $data['tipo_rol'] = 'empleado';
      $data['password'] = Hash::make(rand(0,8));
      $data['confirmation_password'] = Hash::make($data['password']);
      $Usuario= User::create($data);
      $contrato = Contrato::create($data);
      $data['id_usuario'] = $Usuario->id;
      $Telefono= Telefono::create($data);
      $data['id_empresa'] = 1; //id de la unica empresa registrada en el seed
      $data['id_contrato'] = $contrato->id_contrato; //hay algo mal en el modelo o tabla, solucionado  --rename pk en el modelo
      $Empleado = Empleado::create($data);
      Mail::raw('$Usuario->email', function ($message) {
          echo 'welcome tu contraseña es $data[password]';
      });
      return redirect()->route('Empleado.index');
    }

    public function show($id)
    {
      $empleado = Empleado::findOrFail($id); //primary id_cleinte
      return redirect()->route('Usuario.show',['usuario'=>$empleado->id_usuario]);
    }

    public function edit($id)
    {
    //   var_dump($id);
      $empleado = Empleado::findOrFail($id);
      $user=User::findOrFail($empleado->id_usuario);
      $contrato=Contrato::findOrFail($empleado->id_contrato);
      $telefono=Telefono::findOrFail($empleado->id_usuario);
      return view('usuario.empleados.EditEmpleado',['empleado'=>$empleado,'contrato'=>$contrato,'telefono'=>$telefono,'usuario'=>$user]);
    }

    public function update(Request $request, $id)
    {
        $empleado=Empleado::findOrFail($id);
        $empleado->update(){
          $request->all()
        };
        return redirect()->route('Empleado.show',['Empleado'=>$empleado->id_empleado]);
    }

    public function destroy($id)
    {
      $empleado=Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('Empleado.index');
    }
}
