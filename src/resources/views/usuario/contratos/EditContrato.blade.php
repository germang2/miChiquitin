<!--<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Contratos</title>
<link href="{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>-->
@extends('layouts.app')

@section('titulo')
    Modificar Contrato del Empleado {{$usuario->name}}{{$usuario->apellidos}}
    @endsection

@section('content')

  {!!Form::open(['route' => ['Contrato.update','contrato' => $contrato->id_contrato], 'method'=>'POST'])!!}
    {{ method_field('PUT') }}
    {{csrf_field()}}
      <div class="form-group">
      {!!form::label('tipo contrato: ')!!}
      {!!form::text('tipo',$contrato->tipo,['class'=>'form', 'placeholder'=>'assistent','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Salario: ')!!}
      {!!form::text('salario',$contrato->salario,['class'=>'form','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('fecha_inicial: ')!!}
      {!!form::date('fecha_inicial',$contrato->fecha_inicial,['class'=>'form','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('fecha_final: ')!!}
      {!!form::date('fecha_fin',$contrato->fecha_fin,['class'=>'form','autofocus required'])!!}
      </div>
      {!!form::submit('Registrar',['class'=>'btn btn-primary'])!!}
      {!!form::reset('Cancelar',['class'=>'btn btn-boton'])!!}
      {!!form::close()!!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
@endsection
