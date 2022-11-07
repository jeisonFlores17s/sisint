	<div wire:ignore.self class="modal fade" id="exampleModaeditaruser">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Agregar nuevo Articulo</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						@csrf
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<label class="form-label">Rol de Usuario</label>
									<select class="form-control select2bs444"  style="width: 100%;" wire:model="rol">
										<option value="estandar">Estandar</option>
									</select>
									@error('rol') <span class="text-danger">    
										{{ $message }}
									</span>
									@enderror			
								</div>
								<div class="col-md-6">
									<label class="form-label">Area</label>
									<select class="form-control select2bs444"  style="width: 100%;" wire:model="area_id">
										@foreach($areas as $area)
										<option  value="{{ $area->id }}">{{ $area->area }}</option>
										@endforeach
									</select>
									@error('area_id') <span class="text-danger">    
										{{ $message }}
									</span>
									@enderror			
								</div>

							</div>
						</div>	
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn btn-primary" wire:click.prevent="actualizarUser()">Guardar</button>
					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>