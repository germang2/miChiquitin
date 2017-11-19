@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">
                  @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error)
                            <li> {{ $error }} </li>
                          @endforeach
                        </ul>
                    </div>  
                  @endif  
                </div>
                <div class="panel-body">

                <div class="container">
                    <form class="form-horizontal" id="agregarProveedor" 
                    action="{{ route('agregarForm') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group">
                        <label for="idTipo">Id Tipo</label>
                        <select class="form-control" name="idTipo" id="idTipo">
                          <option  value="CC">CC</option>  
                          <option  value="Pasaporte">Pasaporte</option>  
                          <option  value="Cedula Extranjera">Cedula Extranjera</option>  
                          <option  value="Targeta de identidad">TI</option>  
                        </select>                                                                  
                        </div>     
                        <div class="form-group">
                            <label for="representanteLegal">Representante Legal</label>                            
                            <input class="form-control" type="text" name="representanteLegal" id="representanteLegal"> 
                        </div>     
                        <div class="form-group">
                            <label for="idRepresentante">Id Representante</label>                            
                            <input class="form-control" type="text" name="idRepresentante" id="idRepresentante">  
                        </div>
                        <div class="form-group">
                            <label for="idRepresentante">Fecha</label>                            
                            <input class="form-control" type="text" name="fecha" id="fecha">  
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>                            
                            <input class="form-control" type="text" name="telefono" id="telefono">  
                        </div>
                        <div class="form-group">
                            <label for="razonSocial">Razon Social</label>                            
                            <input class="form-control" type="text" name="razonSocial" id="razonSocial">  
                        </div>
                      <div class="form-group">
                        <label for="perJur">Per Jur</label>
                        <select class="form-control" name="perJur" id="perJur">
                          <option value="Natural">Natural</option>  
                          <option value="Juridica">Juridica</option> 
                        </select>                                                 
                      </div>
                      <div class="form-group">
                        <input type="text" readonly="true" hidden="true" name="departamento" id="departamento" 
                        value="">
                        <input type="text" readonly="true" hidden="true" name="ciudad" id="ciudad" 
                        value="">
                        <label for="depciudad">Departamento - Ciudad</label>
                        <select class="form-control" name="depciudad" id="depciudad">
                          <optgroup label="Antioquia">
                            <option value="Antioquia-Medellin">Medellin</option>
                          </optgroup>
                          <optgroup label="Risaralda">
                            <option value="Risaralda-Pereira">Pereira</option>
                            <option value="Risaralda-Dosquebradas">Dosquebradas</option> 
                          </optgroup>
                        </select>                          
                      </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>                            
                            <input class="form-control" type="text" name="direccion" id="direccion">  
                        </div>
                        <button type="submit" class="btn btn-danger">Crear</button>
                    </form>
               </div>
               </div>
            
        </div>
    </div>
</div>
@endsection
