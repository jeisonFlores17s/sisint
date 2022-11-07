<div>
	<form>
		<div class="form-group">
			<label for="" class="form-label">Estatus</label>
			<input type="text" class="form-control" wire:model="estatus">
		</div>
	</form>
	<button type="button" class="btn btn-primary" wire:click.prevent="CrearEstatus()">Salvar</button>
</div>