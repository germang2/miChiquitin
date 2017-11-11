@extends('layouts.app')

@section('titulo')
    Viendo al {{$usuario->tipo_rol}} {{$usuario->name}} {{$usuario->apellidos}}
    @endsection

@section('content')
@php
      $telefono = App\Models\Usuarios\Telefono::findOrFail($usuario->id);
    @endphp
    <div class="row ">
      <div class="col-md-12">
        <h3>Nombre: {{$usuario->name}}<small class="pull-right">
          <a href="{{route ('Usuario.edit',['user' => $usuario->id])}}" class="btn btn-info">Edit</a>
        </small></h3>
         <h3>Apellidos: {{$usuario->apellidos}}  </h3>
         <h3>Email: {{$usuario->email}}  </h3>
           <h3>Direccion: {{$usuario->direccion}}  </h3>
         <h3>Telefono: {{$telefono->telefono}}  </h3>
         <h3>Tipo Rol: {{$usuario->tipo_rol}}  </h3>
         <h3>Edad: {{$usuario->edad}}  </h3>
    @if ($usuario->tipo_rol=='cliente')      @php
        $cliente=App\Models\Usuarios\Cliente::where('id_usuario',$usuario->id)->firstOrFail();
      @endphp
      <h3>Ciudad: {{$cliente->ciudad}}</h3>
      <h3>Genero: {{$cliente->genero}}</h3>
      <h3>Credito Actual: {{$usuario->credito_actual}}</h3>
      <h3>Credito Maximo: {{$usuario->credito_maximo}}</h3>
    @elseif ($usuario->tipo_rol=='empleado')
      @php
        $empleado=App\Models\Usuarios\Empleado::where('id_usuario',$usuario->id)->firstOrFail();
      @endphp
      <h3>Estado: {{$empleado->estado}}</h3>
      <h3>Cargo: {{$empleado->cargo}}</h3>
      <h3>Area: {{$empleado->estado}}</h3>
    @endif
      </div>
    </div>
@endsection
