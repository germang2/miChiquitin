
@extends('layouts.app')

@section('titulo')
        Modulo Cliente, Todos los clientes
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
          <th>Apellido</th>
          <th>Email</th>
          <th>Ciudad</th>
          <th>Telefono</th>
          <th>Credito Maximo</th>
          <th>Credito Actual</th>
        </thead>
	@foreach($clientes as $cliente)
        <tbody>
            @php
              $user = App\Models\Usuarios\User::findOrFail($cliente->id_usuario);
              $Telefono = App\Models\Usuarios\Telefono::findOrFail($cliente->id_usuario);
            @endphp
            <td><a href="{{route('Cliente.show',['cliente' => $cliente->id_cliente])}}">{{ $user->name}}</a>
            </td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
            <td>{{$cliente->ciudad}}</td>
              <td>{{$Telefono->telefono}}</td>
              <td>{{$user->credito_maximo}}</td>
              <td>{{$user->credito_actual}}
            <small class="pull-right">
              <form action="{{route('Cliente.destroy',['cliente' => $cliente->id_cliente])}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </small><small class="pull-right">
              <a href="{{route ('Cliente.edit', $cliente->id_cliente)}}" class="btn btn-info">Edit</a>
            </small></td>
          </tbody>
    @endforeach
    {{$clientes->render()}}
@endsection
