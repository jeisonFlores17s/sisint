<table>
	<thead>
		<tr>
			<td>Id</td>
			<td>Area</td>
			<td>Fecha de creación</td>
			<td>Fecha de actualización</td>
		</tr>
	</thead>
	<tbody>
		@foreach($areas as $area)
		<tr>
			<td>{{ $area->id }}</td>
			<td>{{ $area->area }}</td>
			<td>{{ $area->created_at }}</td>
			<td>{{ $area->updated_at }}</td>
		</tr>
		@endforeach	
	</tbody>
</table>