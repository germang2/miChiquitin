
  @extends('layouts.app')

  @section('titulo')
      Contrato del Empleado: {{$usuario->name}} {{$usuario->apellidos}}
      @endsection

  @section('content')
  <!--<div class="jumbotron">
          <h1 class="display-3">CLIENTE</h1>
      </div>-->
      <h4>Nombre: {{$usuario->name}}<small class="pull-right">
        <a href="{{route ('Contrato.edit',['contrato' => $contrato->id_contrato])}}" class="btn btn-info">Edit</a>
      </small></h4>
      <h4>Apellidos: {{$usuario->apellidos}}</h4>
      <h4>Tipo Salario:{{$contrato->tipo}}</h4>
      <h4>Remuneracion: {{$contrato->salario}}</h4>
      <h4>Fecha Inicial del contrato: {{$contrato->fecha_inicial}}</h4>
      <h4>Fecha Final del contrato: {{$contrato->fecha_fin}}</h4>
      <h4>Credito para el Empleado: {{$usuario->credito_actual}}</h4>
      <h4>Credito Actual: {{$usuario->credito_maximo}}</h4>
@endsection
