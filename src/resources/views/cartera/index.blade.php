@extends('layouts.app')

@section('titulo')
    <h4>Cartera</h4>
    @endsection

@section('content')
    <div>
        <h1 class="display-3">Bienvenido {{ Auth::user()->name }}</h1>
    </div>
    <div class="row row-md-12">
      <div class="col-md-4">
       <img src="https://cdn2.iconfinder.com/data/icons/website-icons/512/User_Avatar-256.png" class="img-thumbnail">
      </div> 
      <div class="col-lg-8">
        <a href="{{ URL::to('/deuda/create') }}">{!! Form::button('Nueva deuda', array('class' => 'btn btn-default')) !!}<br><br></a>
        <!--a href="{{ url('/cartera/nuevo') }}">{!! Form::button('Nuevo crédito', array('class' => 'btn btn-default')) !!}<br><br></a--> 
        <a href="{{ url('/deuda') }}">{!! Form::button('Ver historial crediticio', array('class' => 'btn btn-default')) !!}<br><br></a>
        <a href="{{ url('/cartera/consultarPagos') }}">{!! Form::button('Consultar pagos', array('class' => 'btn btn-default')) !!}<br><br></a>
        <a href="{{ url('/cartera/consultarPagos') }}">{!! Form::button('Consultar plan de pagos', array('class' => 'btn btn-default')) !!}<br><br></a>
        {!! Form::button('Registrar pago de cuota', array('class' => 'btn btn-default')) !!}<br><br>
      </div>
    </div>

@endsection