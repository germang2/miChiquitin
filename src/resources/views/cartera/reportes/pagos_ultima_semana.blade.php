@extends('layouts.app')

@section('titulo')
  <h4>Cartera / <a href="{{ URL::to('reportes') }}">Reportes</a></h4>
  @endsection

@section('content')

  <!--link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"-->

  <div class="container">

    <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <li><a href="{{ URL::to('reportes/reporte_deudas') }}">Reporte deudas</a></li>
          <li><a href="{{ URL::to('reportes/pagos_ultima_semana') }}">Pagos última semana</a>
          <li><a href="{{ URL::to('reportes/pagos_ultimo_mes') }}">Pagos último mes</a>
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
  <h1>Pagos última semana</h1>
    <div>
      {!! Form::open(['method'=>'GET','url'=>'reportes/reporte_deudas','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
          {{ Form::input('text', 'search', null, array('class'=>'form-control', 'placeholder'=>'Documento')) }}
          {{ Form::submit('Buscar', array('class' => 'btn btn-primary')) }}
      {{ Form::close() }}
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Fecha</td>
                <td>Documento</td>
                <td>Usuario</td>
                <td>Factura</td>
                <td>Valor pagado</td>
                <td>Valor a pagar</td>
                <td>Plazo crédito</td>
                <td>Estado</td>
                <!--td colspan="2"></td-->
            </tr>
        </thead>
        <tbody>
        @foreach($deudas as $deuda)
            <tr>
                <td>{{ $deuda->created_at }}</td>
                <td>{{ $deuda->user->id }}</td>
                <td>{{ $deuda->user->name }}</td><!--td>{{ $deuda->id_usuario }}</td-->
                <td>{{ $deuda->factura->fecha }}</td>
                <td>{{ $deuda->valor_pagado }}</td>
                <td>{{ $deuda->valor_a_pagar }}</td>
                <td>{{ $deuda->plazo_credito }}</td>
                <td>{{ $deuda->estado }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection