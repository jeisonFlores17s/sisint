<div>
	<form>
		<div class="form-group">
			<input type="hidden" wire:model="estado_id">
			<label for="" class="form-label">Estatus</label>
			<input type="text" class="form-control" wire:model="estatus">
		</div>
		<button type="button" class="btn btn-danger" wire:click.prevent="cancelareditarestatus()">Cancelar</button>
		<button type="button" class="btn btn-warning" wire:click.prevent="actualizarEstatus()">Salvar</button>
	</form>
</div>