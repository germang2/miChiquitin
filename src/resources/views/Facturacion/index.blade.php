@extends('layouts.app')

@section('titulo')
  Factura de Venta 
@endsection

@section('content')

  {!! Form::open(['route' => 'factura.validacion.validar', 'method' => 'GET','id_vendedor' => Auth::user()->id_tipo]) !!}

  <div class="container-fluid">

    <div class="col-sm-4">
      <div class="form-group">
        {!! Form::label('id_cliente', 'Identificación del cliente') !!}
        {!! Form::text('id_cliente',null,['class' => 'form-control', 'placeholder'=> 'Identificación del cliente'])!!}
      </div>
    </div>

    <div class="col-sm-4">
      <div class="form-group">
        {!! Form::label('id_plan_pago', 'Plan de pago') !!}
        {!! Form::select('type',['vacio' => '', '1' => 'Efectivo', '2' => 'Credito'], null, ['class' => 'form-control'], ['onclick' => 'cuotas()'])!!}
      </div>
    </div>

    <div class="col-sm-4">
    <div class="form-group" id = "Cuotas" hidden="" >
        {!! Form::label('cuotas', 'Cuotas') !!}
        {!! Form::select('typeC',['vacio' => '','1' => '1 mes', '2' => '3 meses', '3' => '6 meses',], null, ['class' => 'form-control'])!!}
      </div>
    </div>

    <div class="form-group" align="center">
      {!! Form::submit('Iniciar', ['class' => 'btn btn-primary']) !!}
    </div>
  </div>
  {!! Form::close()!!}

  @if ($status == '1')
    <div class="alert alert-danger" role="alert">
    No es posible realizar esta venta, por favor contacte con su administrador
    </div>
  @endif

  @if ($status == '2')
    <div class="alert alert-danger" role="alert">
      Aun no ha digitado la identificación del cliente
    </div>
  @endif

@endsection

<script>
  function cuotas() {
    var type= $("[name=type]").val();
    if (type == "1") {
      $("#Cuotas").show();
    }
    if (type == "2") {
      $("#Cuotas").hide();
    }
  } 
</script>