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
					<form>
						@csrf
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<label for="name" class="form-label">{{ __('Nombre de Usuario') }}</label>
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
									@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
								<div class="col-md-6">
									<label for="email" class="form-label">{{ __('Correo') }}</label>
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email">
									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror				
								</div>
								<div class="col-md-6">
									<label for="password" class="form-label">{{ __('Contraseña') }}</label>

									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" wire:model="password" required autocomplete="nueva-contraseña">

									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror				
								</div>
								<div class="col-md-6">
									<label for="password-confirm" class="form-label">{{ __('Confirmar contraseña') }}</label>

									<input id="password-confirm" type="password" class="form-control" wire:model="password_confirmation" required autocomplete="nueva-contraseña">
								</div>
								<div class="col-md-6">
									<label class="form-label">Rol de Usuario</label>
									<select class="form-control select2bs444"  style="width: 100%;" wire:model="rol">
										<option selected value="estandar">Estandar</option>

									</select>
									@error('rol') <span class="text-danger">    
										{{ $message }}
									</span>
									@enderror			
								</div>
								<div class="col-md-6">
									<label class="form-label">Rol de Usuario</label>
									<select class="form-control select2bs444"  style="width: 100%;" wire:model="area_id">
										@foreach($areas as $area)
										<option selected value="{{ $area->id }}">{{ $area->area }}</option>
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
						<button type="button" class="btn btn-primary" wire:click.prevent="crearUser()">Guardar</button>
					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>