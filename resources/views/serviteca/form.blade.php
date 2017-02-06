@extends('layout.app')

@section('content')

	<?php
		// Data serviteca
	    if ($serviteca->exists):
	       	$form_data = array('route' => ['serviteca.update', $serviteca->id], 'method' => 'PATCH');
	       	$action    = 'Editar';
	    else:
	        $form_data = array('route' => 'serviteca.store', 'method' => 'POST');
	        $action = 'Crear';
		endif;
	?>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
					    <div class="col-md-8">
					        Serviteca
					    </div>

					    <div class="col-md-4" style="text-align: right;">
					        <a href="{{ route('serviteca.index') }}" class="btn btn-info">Lista de servitecas</a>
					    </div>
			  		</div>
				</div>
				<div class="panel-body">
					@include ('errors', ['errors' => $errors])
					{!! Form::model($serviteca, $form_data, array('role' => 'form')) !!}
						<div class="row">
					        <div class="form-group col-md-8">
					            {!! Form::label('serviteca_nombre', 'Nombre') !!}
					            {!! Form::text('serviteca_nombre', null, array('placeholder' => 'Nombre', 'class' => 'form-control')) !!}
					        </div>
					    </div>
					    <div class="row">
					        <div class="form-group col-md-5">
					        	{!! Form::label('serviteca_direccion', 'Dirección') !!}
					            {!! Form::text('serviteca_direccion', null, array('placeholder' => 'Dirección', 'class' => 'form-control')) !!}
					        </div>
					        <div class="form-group col-md-4">
					            {!! Form::label('serviteca_email', 'Email') !!}
					            {!! Form::text('serviteca_email', null, array('placeholder' => 'Email', 'class' => 'form-control')) !!}
					        </div>
					        <div class="form-group col-md-3">
					            {!! Form::label('serviteca_telefono', 'Teléfono') !!}
					            {!! Form::text('serviteca_telefono', null, array('placeholder' => 'Dirección', 'class' => 'form-control')) !!}
					        </div>
					    </div>
					    <div class="row">
					        <div class="form-group col-md-5">
					        	{!! Form::label('serviteca_horario', 'Horario') !!}
					            {!! Form::text('serviteca_horario', null, array('placeholder' => 'Horario', 'class' => 'form-control')) !!}
					        </div>
					        <div class="form-group col-md-3">
					        	{!! Form::label('serviteca_latitud', 'Latitud') !!}
					            <span class="glyphicon glyphicon-user" id="customer-glyphicon"></span>
					            {!! Form::text('serviteca_latitud', null, array('placeholder' => 'Latitud', 'class' => 'form-control')) !!}
					        </div>
					        <div class="form-group col-md-3">
					        	{!! Form::label('serviteca_longitud', 'Longitud') !!}
					            <span class="glyphicon glyphicon-user" id="customer-glyphicon"></span>
					            {!! Form::text('serviteca_longitud', null, array('placeholder' => 'Longitud', 'class' => 'form-control')) !!}
					        </div>
					    </div>
					    <div class="row">
					     	<div class="form-group col-md-12">
					        	{!! Form::label('serviteca_servicios', 'Servicios') !!}
					            {!! Form::text('serviteca_servicios', null, array('placeholder' => 'servicios', 'class' => 'form-control')) !!}
					        </div>
					    </div>
					    <div class="row" align="center">
					    	{!! Form::button($action . ' serviteca', array('type' => 'submit','class' => 'btn btn-success')) !!}
						</div>
				    {!! Form::close() !!}
				</div>
				@if($serviteca->exists)
					{!! Form::open(array('route' => 'serviteca.file','files' => true)) !!}
					<div class="panel-footer">
						<div class="row">
					        <div class="form-group col-md-4">
								{!! Form::hidden('serviteca_id', $serviteca->id) !!}
					        	{!! Form::label('serviteca_imagen', 'Imagen') !!}
	        		            {!! Form::file('serviteca_imagen') !!}
					        </div>
					        <div class="form-group col-md-4">
					     		{!! Form::button('Actualizar imagen', array('type' => 'submit','class' => 'btn btn-success')) !!}
					        </div>
					    </div>
						<div class="row">
					        <div class="form-group col-md-4">
		            			<div><img src="{{ $serviteca->serviteca_imagen }}" class="img-responsive" width="200" height="auto"></div>
							</div>
					    </div>
					</div>
					{!! Form::close() !!}
				@endif
			</div>
		</div>
	</div>
@endsection
