@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  @endsection

@section('content')
  <div class="container">

  <nav class="navbar navbar-inverse">
      <ul class="nav navbar-nav">
          <li><a href="{{ URL::to('plan') }}">Todos los planes</a></li>
          <li><a href="{{ URL::to('plan/create') }}">Nuevo plan</a>
      </ul>
  </nav>
  <h1>Todos los planes de pago</h1>
  <div class="col-lg-12">

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>Descripción</td>
                <td>Cuotas</td>
                <td>Valor cuota</td>
                <td>Interés</td>
                <td>Forma de pago</td>
                <td colspan="2"></td>
            </tr>
        </thead>
        <tbody>
        @foreach($planes as $plan)
            <tr>
                <td>{{ $plan->id_usuario }}</td>
                <td>{{ $plan->id_plan }}</td>
                <td>{{ $plan->id_factura }}</td>
                <td>{{ $plan->valor_pagado }}</td>
                <td>{{ $plan->valor_a_pagar }}</td>
                <td>{{ $plan->plazo_credito }}</td>
                <td>{{ $plan->estado }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    <!-- delete the plan (uses the destroy method DESTROY /plan_de_pago/{id} -->
                    <!-- we will add this later since its a little more complicated than the other two buttons -->

                    <!-- show the plan (uses the show method found at GET /plan_de_pago/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('plan_de_pago/' . $plan->id) }}">Ver</a>

                    <!-- edit this plan (uses the edit method found at GET /plan/{id}/edit -->
                    <a class="btn btn-small btn-info" href="{{ URL::to('plan_de_pago/' . $plan->id . '/edit') }}">Editar</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
  </div>
  </div>
@endsection