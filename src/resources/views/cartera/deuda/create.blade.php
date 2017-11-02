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
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <h1>Nuevo crédito</h1>
  <div class="col-lg-6">
    {{ Form::open(array('url' => 'deuda')) }}

      <div class="form-group">
          {{ Form::label('id_usuario', 'Usuario') }}
          {{ Form::select('id_usuario', $usuarios, null, array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('id_plan', 'Plan') }}
          {{ Form::select('id_plan', $planes, null, array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('id_factura', 'Factura') }}
          {{ Form::select('id_factura', $facturas, null, array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('valor_pagado', 'Valor pagado') }}
        {{ Form::number('valor_pagado', null, array('class' => 'form-control')) }}
      </div>
  </div>
  <div class="col-lg-6">
      <div class="form-group">
          {{ Form::label('valor_a_pagar', 'Valor a pagar') }}
        {{ Form::number('valor_a_pagar', null, array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('plazo_credito', 'Plazo crédito') }}
        {{ Form::date('plazo_credito', null, array('class' => 'form-control')) }}
      </div>

      <div class="form-group">
          {{ Form::label('estado', 'Estado') }}
        {{ Form::select('estado', ['Activo' => 'Activo', 'Pendiente' => 'Pendiente', 'Cancelado' => 'Cancelado']) }}
      </div>
  </div>
  </div>

   <div class="row" align="center"><br>
    {{ Form::submit('Guardar', array('class' => 'btn btn-primary')) }}
  </div>

   {{ Form::close() }}
@endsection