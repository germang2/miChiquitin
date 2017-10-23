<!-- app/views/deudas/create.blade.php -->

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

<h1>Create a deuda</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'deudas')) }}

    <div class="form-group">
        {{ Form::label('id_usuario', 'Usuario') }}
        {{ Form::number('id_usuario', Input::old('id_usuario'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('id_plan', 'Plan') }}
        {{ Form::number('id_plan', Input::old('id_plan'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('id_factura', 'Factura') }}
        {{ Form::number('id_factura', Input::old('id_factura'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('valor_pagado', 'Valor pagado') }}
       {{ Form::number('valor_pagado', Input::old('valor_pagado'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('valor_a_pagar', 'Valor a pagar') }}
       {{ Form::number('valor_a_pagar', Input::old('valor_a_pagar'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('plazo_credito', 'Plazo crédito') }}
       {{ Form::date('plazo_credito', Input::old('plazo_credito'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('estado', 'Estado') }}
       {{ Form::text('estado', Input::old('estado'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the deuda!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>