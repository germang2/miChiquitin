
  @extends('layouts.app')

  @section('titulo')
      Lista Empleados
      @endsection
  @section('content')
    <a href="{{route('Usuario.index')}}" class="btn btn-info">Todos los Usuarios</a>
    <a href="{{route('Cliente.index')}}" class="btn btn-info">Todos los Clientes</a>
     <a href="{{route('Empleado.index')}}" class="btn btn-info">Todos los Empleados</a>
     <a href="{{route('Contrato.index')}}" class="btn btn-info">Todos los  Contratos</a>
    <table class="table">
        <thead>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Email</th>
          <th>Telefono</th>
          <th>Estado</th>
          <th>Cargo</th>
          <th>Area</th>
          <th>Ver Contrato</th>
        </thead>
	@foreach($Empleados as $empleado)
    @php
      $user=App\Models\Usuarios\User::where('id',$empleado->id_usuario)->firstOrFail();
      $telefono=App\Models\Usuarios\Telefono::findOrFail($user->id);
    @endphp
    <tbody>
              <td><a href="{{route('Usuario.show',['usuario' => $empleado->id_empleado])}}">{{$user->name}}</a></td>
              <td>{{$user->apellidos}}</td>
              <td>{{$user->email}}</td>
              <td>{{$telefono->telefono}}</td>
              <td>{{$empleado->estado}}</td>
              <td>{{$empleado->cargo}}</td>
              <td>{{$empleado->area}}</td>
                <td><small class="pull-right">
                </small>
                    <a href="{{route ('Contrato.show',['contrato'=>$empleado->id_contrato])}}" class="btn btn-info">Ver</a>
                <small class="pull-right">
              <form action="{{route('Empleado.destroy',['empleado' => $empleado->id_empleado])}}" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class="btn btn-danger">Delete</button>
              </form></small><small class="pull-right">
                  <a href="{{route ('Empleado.edit',['empleado' => $empleado->id_empleado])}}" class="btn btn-info">Edit</a>
            </small></td>
          </tbody>
    @endforeach
    {{$Empleados->render()}}
@endsection
