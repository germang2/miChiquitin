<!--<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title> Empresa </title>
<!- Styles -
    <link href="{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>-->
@extends('layouts.app')

@section('titulo')
    Informacion de la Empresa
    @endsection

@section('content')
<div class="jumbotron">
        <h1 class="display-3">EMPRESA Mi Chiquitin</h1>
    </div>
    <table class="table">
        <thead>
          <th>Nombre</th>
          <th>Direccion</th>
          <th>Telefono</th>
        </thead>
	@foreach($empresas as $empresa)
    <tbody>
            <td>{{$empresa->nombre}}</td>
            <td>{{$empresa->direccion}}</td>
            <td>{{$empresa->telefono}}
              <small class="pull-right">
              <!--<form action="route('Usuario.destroy',['usuario' => $user->id])}}" method="post">
                {csrf_field()}}
                {method_field('DELETE')}}
                <button type="submit" class="btn btn-danger">Delete</button>-->
              </form></small><small class="pull-right">
                  <a href="{{route ('Empresa.edit',['empresa' => $empresa->id_empresa])}}" class="btn btn-info">Edit</a>
            </small></td>
    @endforeach
@endsection
