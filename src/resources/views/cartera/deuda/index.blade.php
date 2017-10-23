<!-- app/views/deudas/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('deudas') }}">deuda Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('deudas') }}">View All deudas</a></li>
        <!--li><a href="{{ URL::to('deudas/create') }}">Create a deuda</a-->
    </ul>
</nav>

<h1>All the deudas</h1>

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
        </tr>
    </thead>
    <tbody>
    @foreach($deudas as $key => $value)
        <tr>
            <td>{{ $value->id_usuario }}</td>
            <td>{{ $value->id_plan }}</td>
            <td>{{ $value->id_factura }}</td>
            <td>{{ $value->valor_pagado }}</td>
            <td>{{ $value->valor_a_pagar }}</td>
            <td>{{ $value->plazo_credito }}</td>
            <td>{{ $value->estado }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the deuda (uses the destroy method DESTROY /deudas/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the deuda (uses the show method found at GET /deudas/{id} -->
                <!--a class="btn btn-small btn-success" href="{{ URL::to('deudas/' . $value->id) }}">Show this deuda</a-->

                <!-- edit this deuda (uses the edit method found at GET /deudas/{id}/edit -->
                <!--a class="btn btn-small btn-info" href="{{ URL::to('deudas/' . $value->id . '/edit') }}">Edit this deuda</a-->

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>