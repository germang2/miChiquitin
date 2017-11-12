@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
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
  <h1>Reporte deudas</h1>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Usuario</td>
                <td>deuda</td>
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
                <td>{{ $deuda->user->name }}</td><!--td>{{ $deuda->id_usuario }}</td-->
                <td>{{ $deuda->id_deuda }}</td>
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