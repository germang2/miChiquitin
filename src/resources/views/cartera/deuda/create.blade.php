@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  @endsection

@section('content')

  <!--link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"-->

  <div class="container">

    <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <li><a href="{{ URL::to('deuda') }}">Todos los créditos</a></li>
          <li><a href="{{ URL::to('deuda/create') }}">Nuevo crédito</a>
      </ul>
    </nav>

  <h1>Nuevo crédito</h1>
  <div class="col-lg-6">

    {{ Form::open(array('url' => 'deuda')) }}

      <div class="form-group">
          {{ Form::label('id_usuario', 'Usuario') }}
          {{ Form::number('id_usuario', 'id_usuario', array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('id_plan', 'Plan') }}
          {{ Form::select('id_plan', $planes, array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('id_factura', 'Factura') }}
          {{ Form::number('id_factura', 'id_factura', array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('valor_pagado', 'Valor pagado') }}
        {{ Form::number('valor_pagado', 'valor_pagado', array('class' => 'form-control')) }}
      </div>
  </div>
  <div class="col-lg-6">
      <div class="form-group">
          {{ Form::label('valor_a_pagar', 'Valor a pagar') }}
        {{ Form::number('valor_a_pagar', 'valor_a_pagar', array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('plazo_credito', 'Plazo crédito') }}
        {{ Form::date('plazo_credito', 'plazo_credito', array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('estado', 'Estado') }}
        {{ Form::text('estado', 'estado', array('class' => 'form-control')) }}
      </div>
  </div>
  </div>

   <div class="row" align="center"><br>
    {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
  </div>

   {{ Form::close() }}
@endsection