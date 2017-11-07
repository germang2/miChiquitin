@extends('layouts.app')

@section('titulo')

  <div class="container">
    <div class="row">
      <div class="col-sm-10">
        Factura de Venta # 1
      </div>
      <div class="col-sm-2">
        Fecha
      </div>
    </div>
  </div>
@endsection

@section('content')


<div class="container-fluid productos">

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
@endsection