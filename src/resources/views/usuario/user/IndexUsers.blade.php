@extends('layouts.app')

@section('titulo')
    Modulo Cliente, Lista de Usuarios
    @if(Session::has('flash_message'))
      {{Session::get('flash_message')}}
    @endif
    @endsection

@section('content')
  <a href="{{route('Usuario.index')}}" class="btn btn-info">Todos los Usuarios</a>
  <a href="{{route('Cliente.index')}}" class="btn btn-info">Todos los Clientes</a>
   <a href="{{route('Empleado.index')}}" class="btn btn-info">Todos los Empleados</a>
   <a href="{{route('Contrato.index')}}" class="btn btn-info">Todos los  Contratos</a>
    <table class="table">
        <thead>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Tipo Rol</th>
        </thead>
    @foreach($users as $user)
    @if ($user->tipo_rol!='root')
    <tbody>
        @php
        $Telefono = App\Models\Usuarios\Telefono::findOrFail($user->id);
      @endphp
            <td><a href="{{route('Usuario.show',['usuario' => $user->id])}}">{{$user->name}}</a></td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
            <td>{{$Telefono->telefono}}</td>
            <td>{{$user->tipo_rol}}
              <small class="pull-right">
                  <form action="{{route('Usuario.destroy',['usuario' => $user->id])}}" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
            </small><small class="pull-right">
                  <a href="{{route ('Usuario.edit',['user' => $user->id])}}" class="btn btn-info">Edit</a>
            </small></td>
          </tbody>
          @endif
    @endforeach
    {{$users->render()}}
@endsection
