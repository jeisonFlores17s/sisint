<div>

	<button type="button" class="btn btn-primary btn-flat btn-sm"  data-toggle="modal" data-target="#exampleModalEstatu">
		Opciones para estatus
	</button>


	<!-- Modal crear -->
	<div wire:ignore.self class="modal fade" id="exampleModalEstatu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Estatus</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					@if($updateMode)
					@include('livewire.articulos.estatus.editarestatus')
					@else
					@include('livewire.articulos.estatus.crearestatus')
					@endif
					<br><br>
					<table class="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nombre de estatus</th>
								<th>Editar</th>
								<th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
							@foreach($estados as $estado)
							<tr>
								<td>{{ $estado->id }}</td>
								<td>{{ $estado->estatus }}</td>
								<td><button class="btn btn-warning" wire:click="editarEstatus({{$estado->id}})">Editar</button></td>
								<td><button class="btn btn-danger" wire:click="EliminarEstatu({{$estado->id}})">Eliminar</button></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
