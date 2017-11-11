@extends('layouts.app')

@section('titulo')

    @endsection

@section('content')
    <table class="table">
        <thead>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Genero</th>
        </thead>
    @foreach($Users as $user)
    <tbody>
        @php
        $Telefono = App\Models\Usuarios\Telefono::findOrFail($user->id);
      @endphp
            <td><a href="{{route('Usuario.show',['usuario' => $user->id])}}">{{$user->name}}</a></td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->email}}</td>
              <small class="pull-right">
                  <a href="{{route ('Usuario.edit',['user' => $user->id])}}" class="btn btn-info">Edit</a>
            </small></td>
          </tbody>
    @endforeach
@endsection
