@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">

                <div class="container">
                    <form class="form-horizontal" 
                    action="{{ route('createPedido') }}" method="GET">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="id">Proveedor</label>
                            <select class="form-control" id="id" name="id">
                                @foreach($Proveedores as $proveedor)
                                    <option value="{{$proveedor->id}}">
                                        {{ $proveedor->representante_legal }}    
                                    </option>
                                @endforeach    
                            </select>                                                                            
                        </div>                        
                        <button type="submit"   class="btn btn-danger">Seleccionar</button>
                    </form>
               </div>
               </div>
            
        </div>
    </div>
</div>
@endsection
