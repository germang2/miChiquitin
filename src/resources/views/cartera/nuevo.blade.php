@extends('layouts.app')

@section('titulo')
    <h4>Cartera</h4>
    <div class="well">
      <h1 class="display-3">Nuevo crédito</h1>
    </div>
    @endsection

@section('content')

    <div class="row">
        <div class="col-lg-4">
            {!! Form::label('usuario', 'Nombres', null, ['class' => 'form-control']) !!}
            {!! Form::input('text', 'usuario', null, ['class' => 'form-control']) !!}<br>
            {!! Form::label('usuario', 'Documento', null, ['class' => 'form-control']) !!}
            {!! Form::input('text', 'usuario', null, ['class' => 'form-control']) !!}<br>
            {!! Form::label('usuario', 'Fecha del crédito', null, ['class' => 'form-control']) !!}
            {!! Form::input('date', 'usuario', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-lg-4">
            {!! Form::label('usuario', 'Apellidos', null, ['class' => 'form-control']) !!}
            {!! Form::input('text', 'usuario', null, ['class' => 'form-control']) !!}<br>
            {!! Form::label('usuario', 'Cuota inicial', null, ['class' => 'form-control']) !!}
            {!! Form::input('number', 'usuario', null, ['class' => 'form-control']) !!}<br>
            {!! Form::label('usuario', 'Número de cuotas', null, ['class' => 'form-control']) !!}
            {!! Form::input('number', 'usuario', 12, ['class' => 'form-control', 'step' => 12]) !!}<br>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        {!! Form::label('usuario', 'Fecha de vencimiento', null, ['class' => 'form-control']) !!}
        {!! Form::input('date', 'usuario', null, ['class' => 'form-control']) !!}
      </div>
      <div class="col-lg-4">
        <br>
        {!! Form::button('Guardar', array('class' => 'btn btn-lg btn-primary')) !!}
      </div>
    </div>

@endsection