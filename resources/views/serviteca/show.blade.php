@extends('layout.app')

@section('content')
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
					    <div class="col-md-8">
					        Servitecas
					    </div>

					    <div class="col-md-4" style="text-align: right;">
				            <a href="{{ route('serviteca.edit', $serviteca->id) }}" class="btn btn-primary">Editar</a>
					        <a href="{{ route('serviteca.index') }}" class="btn btn-info">Lista de servitecas</a>
					    </div>
			  		</div>
				</div>
				<div class="panel-body">
					<div class="row">
				        <div class="form-group col-md-8">
				            <label><b>Nombre</b></label>
				            <div>{{ $serviteca->serviteca_nombre }}</div>
				        </div>
				   	</div>
				    <div class="row">
				        <div class="form-group col-md-5">
				        	<label><b>Dirección</b></label>
				            <div>{{ $serviteca->serviteca_direccion }}</div>
				        </div>
				        <div class="form-group col-md-4">
				            <label><b>Email</b></label>
				            <div>{{ $serviteca->serviteca_email }}</div>
				        </div>
				        <div class="form-group col-md-3">
				            <label><b>Teléfono</b></label>
				            <div>{{ $serviteca->serviteca_telefono }}</div>
				        </div>
				    </div>
				    <div class="row">
				        <div class="form-group col-md-5">
				        	<label><b>Horario</b></label>
				            <div>{{ $serviteca->serviteca_horario }}</div>
				        </div>
				       	<div class="form-group col-md-3">
				        	<label><b>Latitud</b></label>
				            <span class="glyphicon glyphicon-user" id="customer-glyphicon"></span>
				            <div>{{ $serviteca->serviteca_latitud }}</div>
				        </div>
				        <div class="form-group col-md-3">
				        	<label><b>Longitud</b></label>
				            <span class="glyphicon glyphicon-user" id="customer-glyphicon"></span>
				            <div>{{ $serviteca->serviteca_longitud }}</div>
				        </div>
				    </div>
				    <div class="row">
				        <div class="form-group col-md-12">
				        	<label><b>Servicios</b></label>
				            <div>{{ $serviteca->serviteca_servicios }}</div>
				        </div>
				    </div>
				    <div class="row">

				    </div>
				    <div class="row">
				        <div class="form-group col-md-4" >
				        	<label><b>Imagen</b></label>
				        	@if($serviteca->serviteca_imagen)
				            	<div><img src="{{ $serviteca->serviteca_imagen }}" class="img-responsive" width="200" height="auto"></div>
				        	@endif
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
@endsection
