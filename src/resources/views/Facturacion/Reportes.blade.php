@extends('layouts.app')


@section('titulo')
	Reporte por filtros
@endsection

@section('content')
   
	{!! Form::open(['route' => 'ReporteFiltro', 'method' => 'GET']) !!}

		<div class="form-group container">
			<div class ="row">
				<div class = 'form-group col-sm-3'>
					{!! Form::label('id_cliente', 'Identificación del cliente') !!}
					{!! Form::text('id_cliente',null,['class' => 'form-control', 'placeholder'=> 'Identificación del cliente'])!!}
				</div>
				<div class = 'form-group col-sm-3'>
					{!! Form::label('fecha', 'Fecha') !!}
					{!! Form::date('fecha',null,['class' => 'form-control'])!!}
				</div>
				<div class = 'form-group col-sm-3'>
					{!! Form::label('Metodo de pago', 'Metodo de pago') !!}
					{!! Form::select('type',['vacio' => '', '1' => 'Efectivo', '2' => 'Credito a un mes', '3' => 'Credito a dos mes', '4' => 'Credito a seis mes',], null, ['class' => 'form-control'])!!}
				</div>
				<div class = 'form-group col-sm-3'>
					{!! Form::label('Estado', 'Estado') !!}
					{!! Form::select('estado',['vacio' => '','cancelado' => 'Cancelado', 'pendiente' => 'Pendiente', 'anulado' => 'Anulado'], null, ['class' => 'form-control'])!!}
				</div>
			</div>
			<div class ="row">
				<div class = 'form-group col-sm-12'>
					{!! Form::label('Productos', 'Productos') !!}
					<div class = 'form-group'>
						<div class="btn-group" data-toggle="buttons">
							@foreach($articulos as $articulo)
								<label class="btn btn-primary ">
								<input type='checkbox'  name="productos[]" value='{!! $articulo->id !!}'>{!! $articulo->nombre !!}
								</label>
							@endforeach	
						</div>
					</div>
				</div>
			</div>
			{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
			</div>
				
		</div>
			

	{!! Form::close()!!}
	
	@if(isset($facturas))
		<table class='table table-striped' >
			<thead>
				<th>ID</th>
				<th>Fecha</th>
				<th>ID Cliente</th>
				<th>ID Plan de pago</th>
				<th>Cuotas</th>
				<th>Valor Cuotas</th>
				<th>ID Vendedor</th>
				<th>Valor total</th>
				<th>Estado</th>
				<th>Mas detalles</th>
			</thead>
			<tbody>
				@foreach($facturas as $factura)
					<tr>
						<td>{{$factura->id}}</td>
						<td>{{$factura->fecha}}</td>
						<td>{{$factura->id_cliente}}</td>
						<td>{{$factura->id_plan_pago}}</td>
						<td>{{$factura->cuotas}}</td>
						<td>{{$factura->valor_cuota}}</td>
						<td>{{$factura->id_vendedor}}</td>
						<td>{{$factura->valor_total}}</td>
						<td>{{$factura->estado}}</td>
						<td>
							<div class="form-group">
								{!! Form::open(['route' => 'ReporteDetalle', 'method' => 'GET']) !!}
								{!! Form::hidden('detalles', $factura->id) !!}
								{!! Form::submit('Mas detalles', ['class' => 'btn btn-primary']) !!}
								{!! Form::close()!!}
							</div>	
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@endif

@endsection
