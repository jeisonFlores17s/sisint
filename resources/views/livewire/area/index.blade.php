<div>

    @include('livewire.area.editararea')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Areas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            @include('livewire.area.creararea')                       
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <table class="table center table-responsive">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input type="search" wire:model="search" class="form-control form-control-lg" placeholder="Buscar area">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-right">
               Total de areas
           </div>
           <div class="col-md-3 text-right">
            <div class="text-white" style="background-color:green;">   
                {{ $total_areas }}
            </div>

        </div>
    </div>
        <div class="btn-group dropright">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Exportar por
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item hover" href="#" wire:click="AreaTodosExport()"><i class="fa-solid fa-file-csv"></i> Exportar todas las areas</a>
                <div class="dropdown-divider"></div>
            </div>
        </div>
        <br><br>

    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre del area</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($areas as $area)
        <tr>
            <th scope="row">{{ $area->id }}</th>
            <td>{{ $area->area }}</td>
            <td>
                <button type="button" class="btn btn-warning btn-flat" data-toggle="modal" data-target="#exampleModaleditararea" wire:click="editar({{ $area->id }})">
                  Editar
              </button>
          </td>
          <td>
            <button class="btn btn-danger btn-flat" wire:click="eliminar({{ $area->id }})">Eliminar</button>
        </td>
    </tr>
    @endforeach
</tbody>

</table>
@if(count($areas)>0)
@else
<p><i>No se encontraron Resultados</i></p>
@endif
<div class="linkspaginate">
  {{ $areas->links() }}  
</div>

</div>
