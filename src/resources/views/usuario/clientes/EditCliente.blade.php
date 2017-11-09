<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Formulario Cliente</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body><!--
extends('layouts.app')

section('titulo')
      Modulo Cliente Editar Cliente
endsection
  section('content')-->

    {!!Form::open(['route' => ['Cliente.update', 'cliente' => $cliente->id_cliente], 'method'=>'POST'])!!}
    {{ method_field('PUT') }}
    {{csrf_field()}}
      <div class="form-group">
      {!!form::label('Nombre: ')!!}
      {!!form::text('name',$usuario->name,['class'=>'form', 'placeholder'=>'your name','autofocus required'])!!}
    </div>
      {!!form::label('Apellidos: ')!!}
      {!!form::text('apellidos',$usuario->apellidos,['class'=>'form','placeholder'=>'your lastname','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Edad: ')!!}
      {!!form::number('edad',$usuario->edad,['class'=>'form','min'=>'18','max'=>'99','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Email: ')!!}
      {!!form::email('email',$usuario->email,['class'=>'form','placeholder'=>'nombre@mozilla.com','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Telefono: ')!!}
      {!!form::tel('telefono',$telefono->telefono,['class'=>'form','minlenght'=>'7','placeholder'=>'your numberphone','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Direccion: ')!!}
      {!!form::text('direccion',$usuario->direccion,['class'=>'form', 'placeholder'=>'your address','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Tipo Rol: ')!!}
      {!!form::select('tipo_rol',['cliente', 'empleado'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Genero: ')!!}
      {!!form::select('genero',['Masculino', 'Femenino'], null)!!}
      </div>
      <div class="form-group">
      {!!form::label('Ciudad: ')!!}
      {!!form::text('ciudad',$cliente->ciudad,['class'=>'form','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('credito_maximo: ')!!}
      {!!form::selectRange('credito_maximo',0,500,$usuario->credito_maximo)!!}
      </div>
      <div class="form-group">
      {!!form::label('credito_actual: ')!!}
      {!!form::selectRange('credito_actual', 0, 200,$usuario->credito_actual)!!}
      </div>
      {!!form::submit('Registrar',['class'=>'btn btn-primary'])!!}
      {!!form::reset('Cancelar',['class'=>'btn btn-boton'])!!}
      {!!form::close()!!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
<!--endsection-->
</body>
</head>
