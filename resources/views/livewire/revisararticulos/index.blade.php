<div>
    <div>
        <div class="container ">
            <div class="row">
                <div class="col-md-6"><h3>Articulos</h3></div>
                <div class="col-md-4"><h3></h3></div>
                <div class="col-md-2"></div>
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-bordered table-responsive">
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input type="search" wire:model="search" class="form-control form-control-lg" placeholder="Buscar por serie, codigo o area">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <thead>
                        <tr>
                         <th>Id</th>
                         <th>Fecha de adquisición</th>
                         <th>responsable</th>
                         <th>Marca</th>
                         <th>Serie</th>
                         <th>codigo</th>
                         <th>Area</th>
                         <th>Estado</th>
                         <th>Costo de adquisición</th>
                         <th>Estatus</th>
                         <th>Acciones</th>
                     </tr>
                 </thead>
                 <tbody>
                    @foreach($articulos as $articulo)
                    <tr>
                        <th scope="row">{{ $articulo->id }}</th>
                        <td>{{ $articulo->fechaadquisicion }}</td>
                        <td>{{ $articulo->name }}</td>
                        <td>{{ $articulo->marca }}</td>
                        <td>{{ $articulo->serie }}</td>
                        <td>{{ $articulo->codigo }}</td>
                        <td>{{ $articulo->area }}</td>
                        <td>{{ $articulo->estado }}</td>
                        <td>{{ $articulo->costodeadquisicion }}</td>
                        <td>{{ $articulo->estatus }}</td>
                        <th>
                            <button type="button" class="btn btn-primary btn-sm"wire:click="editarestatusyobs({{ $articulo->id }})" data-toggle="modal" data-target="#exampleModalObserva">
                                Obs y Estatus
                            </button>
                        </th>
                    </tr>

                    <div wire:ignore.self class="modal fade" id="exampleModalObserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $articulo->id }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="hidden" wire:model="obsestatu_id">
                                        <label for="" class="form-laber">Estatus</label>
                                        <select name="" id="" class="form-control @error('estatu_id') is-invalid @enderror"wire:model="estatu_id" wire:ignore>
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="form-label">Observaciones</label>
                                        <textarea class="form-control rounded-0 @error('observaciones') is-invalid @enderror"name="" id="" rows="5" wire:model="observaciones"></textarea>
                                        @error('observaciones') <span class="text-danger">  
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click.prevent="actualizarestatusyobs()">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>
@if(count($articulos)>0)
@else
<p><i><b>No se encontraron Resultados</b></i></p>
@endif
{{ $articulos->links() }}
</div>
</div>
</div>
