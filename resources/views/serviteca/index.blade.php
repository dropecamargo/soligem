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
							<a href="{{ route('serviteca.create') }}" class="btn btn-info">Nueva serviteca</a>
					    </div>
			  		</div>
				</div>

				<div class="panel-body">
					{!!  Form::open(array('route' => 'serviteca.index', 'method' => 'POST', 'id' => 'form-search-serviteca'), array('role' => 'form')) !!}
					<div class="row">
				        <div class="form-group col-md-12">
				            {!! Form::label('serviteca_nombre', 'Nombre') !!}
				            {!! Form::text('serviteca_nombre', null, array('class' => 'form-control', 'placeholder' => 'Ingrese nombre')) !!}
				        </div>
				 	</div>
				 	<div class="row" align="center">
						<button type="submit" class="btn btn-primary">Buscar</button>
						{!! Form::button('Limpiar', array('class'=>'btn btn-primary', 'id' => 'button-clear-search-serviteca' )) !!}
					</div>
					<br/>
				 	{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div id="serviteca-list" class="col-md-10 col-md-offset-1">
			@include('serviteca.list')
		</div>
	</div>
	<script type="text/javascript">
		var root_url = "<?php echo Request::root(); ?>/";
		var serviteca = {
			search : function(){
				var url = root_url + 'serviteca';
				$.ajax({
					url: url,
					type : 'get',
					data: $('#form-search-serviteca').serialize(),
					datatype: "html"
				})
				.done(function(data) {
					$('#serviteca-list').empty().html(data.html)
				})
				.fail(function(jqXHR, ajaxOptions, thrownError)
				{
					$('#error-app').modal('show');
					$("#error-app-label").empty().html("No hay respuesta del servidor - Consulte al administrador.");
				});
			},
			clearSearch : function(){
				$('#serviteca_nombre').val('')
			}
		}

		$("#form-search-serviteca").submit(function( event ) {
			event.preventDefault()
			serviteca.search()
		})

		$("#button-clear-search-serviteca").click(function( event ) {
			serviteca.clearSearch()
			serviteca.search()
		})
	</script>
@endsection
