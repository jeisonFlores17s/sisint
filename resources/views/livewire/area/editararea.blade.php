<div>
<div wire:ignore.self class="modal fade" id="exampleModaleditararea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>
			<div class="modal-body">
				<form>
					@csrf
                    <div class="form-group">
                        <input type="hidden" wire:model="area_id">
                        <label for="exampleFormControlInput1">Area</label>
                        <input type="text" class="form-control" wire:model="area" id="exampleFormControlInput1" placeholder="">
                        @error('area') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click.prevent="cancelar()">Cerrar</button>
				<button type="button" class="btn btn-primary" wire:click.prevent="actualizar()">Guardar</button>
			</div>
		</div>
	</div>
</div>
</div>