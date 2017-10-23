@extends('layouts.app')

@section('titulo')
    <h4>Cartera</h4>
    @endsection

@section('content')
    <div class="well">
        <h1 class="display-3">Informe de crédito</h1>
    </div>

    <div class="row marketing">
        <div class="col-lg-6">
            {!! Form::label('usuario', 'Documento', null, ['class' => 'form-control']) !!}
            {!! Form::input('text', 'usuario', null, ['class' => 'form-control']) !!}
        </div>
    </div>

@endsection