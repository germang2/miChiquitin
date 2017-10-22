@extends('layouts.app')

@section('titulo')
  <h4>Cartera</h4>
  <div class="well">
    <h1 class="display-3">Consultar pagos</h1>
    <!--script> document.write(new Date().toLocaleDateString()); </script-->
  </div>
@endsection

@section('content')
    <div class="row marketing">
        <div class="col-lg-2">
          <br>
          {!! Form::label('usuario', 'Fecha del crédito', null, ['class' => 'form-control']) !!}
          {!! Form::input('date', 'usuario', null, ['class' => 'form-control']) !!}<br>
          {!! Form::label('usuario', 'Fecha de vencimiento', null, ['class' => 'form-control']) !!}
          {!! Form::input('date', 'usuario', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-lg-8">
          <h3>Créditos</h3>
          <table class="table table-striped table-hover">
            <tr>
              <td><strong>Usuario</strong></td>
              <td><strong>Documento</strong></td>
              <td><strong>Fecha de vencimiento</strong></td>
            </tr>
            <tr>
              <td> John Doe</td>
              <td> 123456 </td>
              <td> 23/07/18 </td>
            </tr>
            <tr>
              <td> Joane Donald </td>
              <td> 7891011 </td>
              <td> 08/10/19 </td>
            </tr>
          </table>
        </div>
    </div>

@endsection