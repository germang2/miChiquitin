<!--<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Formulario Empleado</title>
<link href="{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>-->
@extends('layouts.app')

@section('titulo')
    Crear Empleado
    @endsection

@section('content')
  {!!Form::open(['route'=>['Empleado.store'], 'method'=>'POST'])!!}
    {{csrf_field()}}
      <div class="form-group">
      {!!form::label('Nombre: ')!!}
      {!!form::text('name',null,['class'=>'form', 'placeholder'=>'your name','autofocus required'])!!}
      {!!form::label('Apellidos: ')!!}
      {!!form::text('apellidos',null,['class'=>'form','placeholder'=>'your lastname','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Edad: ')!!}
      {!!form::number('edad',0,['class'=>'form','min'=>'18','max'=>'99','autofocus required'])!!}
      {!!form::label('Telefono: ')!!}
      {!!form::tel('telefono',null,['class'=>'form','placeholder'=>'your numberphone','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Email: ')!!}
      {!!form::email('email',old('email'),['class'=>'form','placeholder'=>'nombre@mozilla.com','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Direccion: ')!!}
      {!!form::text('direccion',null,['class'=>'form', 'placeholder'=>'your address','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Tipo Rol: ')!!}
      {!!form::select('tipo_rol',['empleado', 'cliente'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Estado: ')!!}
      {!!form::text('estado',old('estado'),['class'=>'form','placeholder'=>'your state','autofocus required'])!!}
      {!!form::label('Cargo: ')!!}
      {!!form::text('cargo',old('cargo'),['class'=>'form','placeholder'=>'your job','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Area: ')!!}
      {!!form::text('area',old('area'),['class'=>'form','placeholder'=>'your area','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('tipo contrato: ')!!}
      {!!form::text('tipo',null,['class'=>'form', 'placeholder'=>'mensual anual','autofocus required'])!!}
      {!!form::label('Salario: ')!!}
      {!!form::text('salario',null,['class'=>'form','placeholder'=>'768000','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('fecha_inicial: ')!!}
      {!!form::date('fecha_inicial',"2016-05-01",['class'=>'form','autofocus required'])!!}
      {!!form::label('fecha_final: ')!!}
      {!!form::date('fecha_fin',"2016-05-01",['class'=>'form','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('credito_maximo: ')!!}
      {!!form::selectRange('credito_maximo',0,500)!!}
      {!!form::label('credito_actual: ')!!}
      {!!form::selectRange('credito_actual', 0, 200)!!}
      </div>
      {!!form::submit('Registrar',['class'=>'btn btn-primary'])!!}
      {!!form::reset('Cancelar',['class'=>'btn btn-boton'])!!}
      {!!form::close()!!}
@endsection
