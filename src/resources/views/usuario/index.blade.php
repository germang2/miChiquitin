@extends('layouts.app')

@section('titulo')
    Modulo Cliente
@endsection

@section('content')
  <div class="jumbotron">
          <h1 class="display-3">CLIENTES</h1>
          <p class="lead">Hola,  aqui podrás gestionar la informacion de los usuarios. </p>
      </div>
      <div class="row marketing">
          <div class="col-lg-6">
              <h4><a href="{{route('Cliente.create')}}">Agregar Cliente</a></h4>
              <p>Explicación 1</p>
              <h4><a href="{{route('Empleado.create')}}">Agregar Empleado</a></h4>
              <p>Explicación 1</p>
              <h4><a href="{{route('Usuario.index')}}">Listar Usuarios</a></h4>
              <p>Explicación 2</p>
              <h4><a href="{{route('Empresa.index')}}">Info Empresa</a></h4>
              <p>Explicación 2</p>
          </div>
            <div class="col-lg-6">
              <form action="{{route('Usuario.show',['usuario' => "id"])}}" method="get">
                {{csrf_field()}}
                <input type="submit" value="Buscar" />
                <input type="number" name="id" min="0" max="100" value="{{old('id')}}" autofocus required />
                <br />
              </form>
              <br />
              <p>Explicación 3</p>
              <h4>Funcionlidad 4</h4>
              <p>Explicación 4</p>
          </div>
      </div>
@endsection
