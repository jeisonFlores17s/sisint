<div>
<button type="button" class="btn btn-block btn-primary btn-flat" data-toggle="modal" data-target="#modalxl">
 Nuevo articulo <i class="fa-solid fa-plus"></i>
</button>

<div wire:ignore.self class="modal fade" id="modalxl">
<div class="modal-dialog modal-xl">
<div class="modal-content">
	<div class="modal-header">
		<h4 class="modal-title">Agregar nuevo Articulo</h4>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-md-4">
				<form action="">
					<div class="form-group">
						<label for="exampleDatepicker4" class="form-label">Fecha de Adquisición</label>
						<div class="form-outline datepicker" data-mdb-format="dd, mmm, yyyy">
							<input type="date" class="form-control" id="exampleDatepicker4" placeholder="dd, mmm, yyyy" wire:model="fechaadquisicion">
							@error('fechaadquisicion') <span class="text-danger">	
								{{ $message }}
							</span>@enderror
						</div>
					</div>
				</div>
				<div class="col-md-4 ">
					<div class="form-group">
						<label class="form-label" for="typeText">Codigo</label>
						<input type="text" id="typeText" class="form-control" wire:model="codigo" />
						@error('codigo') <span class="text-danger">	
							{{ $message }}
						</span>@enderror
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="form-label" for="typeText">N°\Folio Comprovante</label>
						<input type="text" id="typeText" class="form-control" wire:model="foliocomprobante" />
						@error('foliocomprobante') <span class="text-danger">	
							{{ $message }}
						</span>@enderror
					</div>
				</div>
			</div>					

			<div class="row ">
				<div class="col-md-6">
					<div class="pb-3">
						<div class="form-group">
							<label class="form-label" for="typeText">Marca</label>
							<input type="text" id="typeText" class="form-control" wire:model="marca" />
							@error('marca') <span class="text-danger">	
								{{ $message }}
							</span>@enderror
						</div>
					</div>
					<div class="pb-3">
						<div class="form-group">
							<label class="form-label" for="typeText">Modelo</label>
							<input type="text" id="typeText" class="form-control" wire:model="modelo" />
							@error('modelo') <span class="text-danger">	
								{{ $message }}
							</span>@enderror
						</div>
					</div>
					<div class="pb-3">
						<div class="form-group">
							<label class="form-label" for="typeText">Serie</label>
							<input type="text" id="typeText" class="form-control" wire:model="serie" />
							@error('serie') <span class="text-danger">	
								{{ $message }}
							</span>@enderror
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="pb-3">
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Descripción</label>
							<textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="8" wire:model="descripcion"></textarea>
							@error('descripcion') <span class="text-danger">	
								{{ $message }}
							</span>@enderror
						</div>
					</div>
				</div>
			</div>

			<div class="row">	
				<div class="col-md-8">	
					<div class="row">	
						<div class="col-md-6">
							<div class="pb-3">
								<div class="form-group">
									<label class="form-label" for="typeText">Costo de adquisicion</label>
									<input type="number" id="typeText" class="form-control" wire:model="costodeadquisicion" step=".01"/>
									@error('costodeadquisicion') <span class="text-danger">	
										{{ $message }}
									</span>
									@enderror
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="pb-3">
								<div class="form-group">
									<label class="form-label" for="typeText">Estado</label>
									<input type="text" id="typeText" class="form-control" wire:model="estado" />
									@error('estado') <span class="text-danger">	
										{{ $message }}
									</span>
									@enderror
								</div>
							</div>
						</div>


						<div class="col-md-12" wire:ignore>
							<div class="pb-3">
								<label class="form-label" for="area_id">Area:</label>
								<select class="form-control"  style="width: 100%;" wire:model="area_id" id="area_id">
									<option>Seleccionar</option>
									@foreach($areas as $area)
									<option value="{{ $area->id }}">{{ $area->area }}</option>
									@endforeach
								</select>
								@error('area_id') <span class="text-danger">	
									{{ $message }}
								</span>
								@enderror
							</div>
						</div>


						<div class="col-md-12">
							<div class="pb-3">
								<label class="form-label" for="user_id">Encargado:</label>
								<select class="form-control"  style="width: 100%;" wire:model="user_id" id="user_id">

									<option value="">Selecciona un encargado</option>

									@foreach($users as $user)
									<option value="{{ $user->id }}">{{ $user->name }}</option>
									@endforeach
								</select>
								@error('user_id') <span class="text-danger">	
									{{ $message }}
								</span>
								@enderror
							</div>
						</div>
						<div class="col-md-12" wire:ignore>
							<div class="pb-3">
								<label class="form-label" for="">Estatus:</label>
								<select class="form-control"  style="width: 100%;" wire:model="estatu_id" >
									<option>Seleccionar</option>
									@foreach($estatuss as $estatu)
									<option value="{{ $estatu->id }}">{{ $estatu->estatus }}</option>
									@endforeach
								</select>
								@error('estatu_id') <span class="text-danger">	
									{{ $message }}
								</span>
								@enderror
							</div>
						</div>
					</div>	
				</div>	
				<div class="col-md-4">
					<div class="pb-3">
						<div class="form-group">
							<label for="exampleFormControlTextarea1">Observaciones:</label>
							<textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="13" wire:model="observaciones"></textarea>
							@error('observaciones') <span class="text-danger">	
								{{ $message }}
							</span>
							@enderror
						</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="modal-footer justify-content-between">
			<button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Cerrar</button>
			<button type="button" class="btn btn-primary btn-flat"wire:click.prevent="creararticulo()">Guardar</button>
		</div>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

</div>