<table class="table table-striped">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th>Serviteca</th>
			<th>Dirección</th>
			<th>Teléfono</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($serviteca as $object)
			<tr>
				<td nowrap="nowrap">
					<a href="{{ route('serviteca.show', $object->id) }}" class="btn btn-info">Ver</a>
					<a href="{{ route('serviteca.edit', $object->id) }}" class="btn btn-primary">Editar</a>
				</td>
				<td>{{ $object->serviteca_nombre }}</td>
				<td>{{ $object->serviteca_direccion }}</td>
				<td>{{ $object->serviteca_telefono }}</td>
				<td>{{ $object->serviteca_email }}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function() {
		$(".pagination a").click(function()
		{
			var url = $(this).attr('href');
			$.ajax({
				url: url,
				type: "GET",
				data: $('#form-search-serviteca').serialize(),
				datatype: "html"
			})
			.done(function(data) {
				$("#serviteca-list").empty().html(data.html);
			})
			.fail(function(jqXHR, ajaxOptions, thrownError)
			{
				$('#error-app').modal('show');
				$("#error-app-label").empty().html("No hay respuesta del servidor - Consulte al administrador.");
			})
			return false;
		});
	});
</script>