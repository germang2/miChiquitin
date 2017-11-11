@extends('layouts.app')

@section('titulo')

    @endsection

@section('content')
    <table class="table">
        <thead>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Rol</th>
          <th>Ultimo Acceso</th>
        </thead>
    @foreach($users as $user)
    <tbody><td>{{$user->name}}</td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->tipo_rol}}</td>
            <td>{{$user->last_login}}</td>
          </tbody>
    @endforeach
@endsection
