@extends('layouts.app')

@section('titulo')
  Editar Informacion de la Empresa
    @endsection

@section('content')

  @if( $empresa->exists )
    {!!Form::open(['route' => ['Empresa.update','empresa' => $empresa->id_empresa], 'method'=>'POST'])!!}
    {{ method_field('PUT') }}
@else <!--para crear nuevas sucursales -->
  {!!Form::open(['route'=>['Empresa.store'], 'method'=>'POST'])!!}
@endif
    {{csrf_field()}}
      <div class="form-group">
      {!!form::label('Nombre: ')!!}
      {!!form::text('name',$empresa->nombre,['class'=>'form', 'placeholder'=>'your name','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Direccion: ')!!}
      {!!form::text('direccion',$empresa->direccion,['class'=>'form','placeholder'=>'your address','autofocus required'])!!}
      </div>
      <div class="form-group">
      {!!form::label('Telefono: ')!!}
      {!!form::tel('telefono',$empresa->telefono,['class'=>'form','autofocus required'])!!}
      </div>
      {!!form::submit('Registrar',['class'=>'btn btn-primary'])!!}
      {!!form::reset('Cancelar',['class'=>'btn btn-boton'])!!}
      {!!form::close()!!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
@endsection