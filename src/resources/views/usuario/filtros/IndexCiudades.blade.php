<!--<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title> Usuarios </title>

<!- Styles -
    <link href="{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>-->
@extends('layouts.app')

@section('titulo')

    @endsection

@section('content')
    <table class="table">
        <thead>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Ciudad</th>
          <th>Genero</th>
        </thead>
    @foreach($clientes as $cliente)
    <tbody>
        @php
        $user = App\Models\Usuarios\User::findOrFail($cliente->id_cliente);
        @endphp
        @if ($user->tipo_rol!='root')@php
          echo 'aqui estoy';
          $Telefono = App\Models\Usuarios\Telefono::findOrFail($user->id);
        @endphp
            <td><a href="{{route('Usuario.show',['usuario' => $user->id])}}">{{$user->name}}</a></td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
            <td>{{$Telefono->telefono}}</td>
            <td>{{$cliente->ciudad}}</td>
            <td>{{$cliente->genero}}
              <small class="pull-right">
                  <a href="{{route ('Usuario.edit',['user' => $user->id])}}" class="btn btn-info">Edit</a>
            </small></td>
          </tbody>
        @endif
    @endforeach
@endsection
