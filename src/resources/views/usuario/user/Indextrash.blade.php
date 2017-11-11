@extends('layouts.app')

@section('titulo')
    Modulo Cliente, Lista de Usuarios
    @endsection

@section('content')
    <table class="table">
        <thead>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Tipo Rol</th>
          <th>Hora eliminado</th>
      <!--    <th>Eliminado By</th>-->
        </thead>
    @foreach($users as $user)
    <tbody>
            <td>{{$user->name}}</td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->tipo_rol}}</td>
              <td>{{$user->deleted_at}}</td>
              <!--<td>{Auth::user()->name}}-->
              <small class="pull-right">
                <td> <a href="{{ route('restore', ['usuario'=>$user->id]) }}" class="btn btn-danger btn-xs">Restore</a>
                </small></td>
          </tbody>
    @endforeach
    {{$users->render()}}
@endsection
