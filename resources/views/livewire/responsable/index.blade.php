				<div>
					@include('livewire.responsable.crearresponsables')
					<!-- Content Header (Page header) -->
					<div class="content-header">
						<div class="container-fluid">
							<div class="row mb-2">
								<div class="col-sm-6">
									<h1 class="m-0">Responsables</h1>
								</div><!-- /.col -->
								<div class="col-sm-6">
									<ol class="breadcrumb float-sm-right">
										<li class="breadcrumb-item"><a href="#">
											<button type="button" class="btn btn-sm btn-block btn-primary btn-flat" data-toggle="modal" data-target="#modalxl">
												Crear nuevo responsable <i class="fa-solid fa-plus"></i>
											</button>
										</a>
									</li>
								</ol>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.container-fluid -->
				</div>
				<div class="container py-8" >
					<table class="table center table-responsive">
						<div class="form-group">
							<div class="input-group input-group-lg">
								<input type="search" wire:model="search" class="form-control form-control-lg" placeholder="Buscar usuario">
								<div class="input-group-append">
									<button type="submit" class="btn btn-lg btn-default">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
						</div>
						<div class="btn-group dropright">
							<button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Exportar por
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item hover" href="#" wire:click="ResponsableTodosExport()"><i class="fa-solid fa-file-csv"></i> Exportar todos los responsables</a>
								<a class="dropdown-item" href="#"  wire:click="ResponsableExport()"><i class="fa-solid fa-file-csv"></i> Exportar responsables por area</a>
								<div class="dropdown-divider"></div>
							</div>
						</div>

						<br><br>
						<thead>
							<tr class="text-center">
								<th scope="col">id</th>
								<th scope="col">Nombre</th>
								<th scope="col">Correo</th>
								<th scope="col">Rol</th>
								<th scope="col">Encargado de area</th>
								<th>Acciones</th>
							</tr>
						</thead>
						@foreach($users as $user)
						<tr class="text-center">
							<th scope="row">{{ $user->id }}</th>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->rol }}</td>
							<td>{{ $user->area }}</td>
							<td>
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModaeditaruser" wire:click="editarUser({{ $user->id }})">
									Editar
								</button>
								<button type="button" class="btn btn-danger"wire:click="eliminarUser({{ $user->id }})">
									Eliminar
								</button>
							</td>
						</tr>
						@include('livewire.responsable.editarresponsables')
						@endforeach
					</tbody>
				</table>
				@if(count($users)>0)
				@else
				<p><i><b>No se encontraron Resultados</b></i></p>
				@endif
			
			{{ $users->links() }}
</div>
