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
    Editar la informacion del empleado {{$usuario->name}} {{$usuario->apellidos}}
      @endsection

  @section('content')
  {!!Form::open(['route' => ['Empleado.update','empleado' => $empleado->id_empleado], 'method'=>'POST'])!!}
    {{ method_field('PUT') }}
    {{csrf_field()}}
      <div class="form-group">
      {!!form::label('Nombre: ')!!}
      {!!form::text('name',$usuario->name,['class'=>'form', 'placeholder'=>'your name','autofocus required'])!!}
      </div>
      <div class="form-group">
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
  <!--    <div class="form-group">
      !!form::label('Contraseña: ')!!}
      !!form::password('password',['class'=>'form','autofocus required'])!!}
      </div>
      <div class="form-group">
      !!form::label('Confirmar contraseña: ')!!}
      !!form::password('confirmation_password',['class'=>'form','autofocus required'])!!}
    </div>-->
      <div class="form-group">
      {!!form::label('Telefono: ')!!}
      {!!form::tel('telefono',$telefono->telefono,['class'=>'form','placeholder'=>'your numberphone','autofocus required'])!!}
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
      {!!form::label('Estado: ')!!}
      {!!form::text('estado',$empleado->estado,['class'=>'form','placeholder'=>'your state','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Cargo: ')!!}
      {!!form::text('cargo',$empleado->cargo,['class'=>'form','placeholder'=>'your job','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Area: ')!!}
      {!!form::text('area',$empleado->area,['class'=>'form','placeholder'=>'your area','autofocus required'])!!}
      </div>
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
      {!!form::date('fecha_inicial', $contrato->fecha_inicial,['class'=>'form','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('fecha_final: ')!!}
      {!!form::date('fecha_fin',$contrato->fecha_fin,['class'=>'form','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('credito_maximo: ')!!}
      {!!form::selectRange('credito_maximo',0,500,$usuario->credito_maximo)!!}
      </div>
      <div class="form-group">
      {!!form::label('credito_actual: ')!!}
      {!!form::selectRange('credito_actual', 0, 200,$usuario->credito_maximo)!!}
      </div>
      {!!form::submit('Registrar',['class'=>'btn btn-primary'])!!}
      {!!form::reset('Cancelar',['class'=>'btn btn-boton'])!!}
      {!!form::close()!!}
@endsection
