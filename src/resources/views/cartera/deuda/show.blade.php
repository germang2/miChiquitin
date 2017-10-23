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
        <li><a href="{{ URL::to('cartera/deudas/create') }}">Create a deuda</a>
    </ul>
</nav>

<h1>Showing {{ $deuda->id_deuda }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $deuda->id_usuario }}</h2>
        <p>
            <strong>Plan:</strong> {{ $deuda->id_plan }}<br>
            <strong>Factura</strong> {{ $deuda->id_factura }}
            <strong>Valor pagado:</strong> {{ $deuda->valor_pagado }}
            <strong>Valor a pagar:</strong> {{ $deuda->valor_a_pagar }}
            <strong>Plazo crédito:</strong> {{ $deuda->plazo_credito }}
            <strong>Estado:</strong> {{ $deuda->estado }}
        </p>
    </div>

</div>
</body>
</html>