@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  @endsection

@section('content')
  <div class="container">

  <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <li><a href="{{ URL::to('deuda') }}">Todos los créditos</a></li>
          <li><a href="{{ URL::to('deuda/create') }}">Nuevo crédito</a>
      </ul>
  </nav>
  <h1>Todos los créditos</h1>
  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Usuario</td>
                <td>Plan</td>
                <td>Factura</td>
                <td>Valor pagado</td>
                <td>Valor a pagar</td>
                <td>Plazo crédito</td>
                <td>Estado</td>
                <td colspan="2"></td>
            </tr>
        </thead>
        <tbody>
        @foreach($deudas as $deuda)
            <tr>
                <td>{{ $deuda->id_usuario }}</td>
                <td>{{ $deuda->id_plan }}</td>
                <td>{{ $deuda->id_factura }}</td>
                <td>{{ $deuda->valor_pagado }}</td>
                <td>{{ $deuda->valor_a_pagar }}</td>
                <td>{{ $deuda->plazo_credito }}</td>
                <td>{{ $deuda->estado }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the deuda (uses the destroy method DESTROY /deuda/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the deuda (uses the show method found at GET /deuda/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('deuda/' . $deuda->id) }}">Ver</a>

                    <!-- edit this deuda (uses the edit method found at GET /deuda/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('deuda/' . $deuda->id . '/edit') }}">Editar</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
  </div>
  </div>
@endsection