@extends('layouts.app')

@section('titulo')

  <div class="container">
    <div class="row">
      <div class="col-sm-10">
        Factura de Venta # {{ $idFactura }}
      </div>
      <div class="col-sm-2">
        {{$fecha}}
      </div>
    </div>
  </div>
@endsection

@section('content')

<div class="container-fluid información">
  <div class="row">
     <div class="col-md-8">
      <label> Vendedor: {{ Auth::user()->name }}</label> <br>
      <label> Identificación del cliente: {{ $id_cliente }}</label> <br>
      <label> Nombre del cliente: {{ $nombre_cliente }} </label> <br>
      <label> Plan de pago: {{ $plan_pago }}  </label><br>
      <label> Cuotas: {{ $cuota_credito }}  </label><br>
    </div>

    <div class="col-md-4" align="right">
      <img src="{{ asset('assets/img/chiquitin.png') }}" alt="logo" width="160" height="40"><br>
      <div class="container-fluid">
        <label> NIT: 0.000.000.000-0 </label> <br>
        <label> Dirección: Calle 00 # 00 - 00 Barrio </label> <br>
        <label> Teléfono: 0000000</label> <br>
        <label> Correo: chiquitin@gmail.com </label> <br> 
      </div>
    </div>
  </div>
</div>

<div class="container-fluid productos">
  <table class='table table-striped'>
      <thead>
        <th>Codigo</th>
        <th>Descripción</th>
        <th>Cantidad</th>
        <th>Precio venta</th>
      </thead>
      <tbody>
      </tbody>
  </table>
</div>

<div class="container-fluid productos">
  Total:
</div>

@endsection