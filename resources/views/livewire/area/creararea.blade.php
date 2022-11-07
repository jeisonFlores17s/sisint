<div>
	<button type="button" class="btn btn-block btn-flat  btn-primary" data-toggle="modal" data-target="#exampleModalll">Nueva Area <i class="fa-solid fa-plus"></i></button>

	<!-- Modal -->
	<div wire:ignore.self class="modal fade" id="exampleModalll" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Area</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
				</div>
				<form>
					<div class="modal-body">
						<div class="form-group">
							<label for="">Nombre del area</label>
							<input type="text" class="form-control" wire:model="area">
							@error('area') <span class="text-danger">	
								{{ $message }}
							</span>@enderror
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"wire:click.prevent="cancelar()">Close</button>
					<button type="button" class="btn btn-primary btn-flat" wire:click.prevent="subirarea()">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</div>