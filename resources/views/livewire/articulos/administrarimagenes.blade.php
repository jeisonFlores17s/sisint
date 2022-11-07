<div>
	    <div wire:ignore.self class="modal fade fade bd-example-modal-xl" id="exampleModalimagenes{{ $articulo->id }}"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $articulo->id }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form enctype="multipart/form-data">
                            <input type="hidden"wire:model="articulos_id">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                <div wire:loading wire:target="imagenes">
                               <div class="spinner-border text-primary" role="status">
                                 <span class="sr-only">Cargando...</span>
                                </div>
                            </div>
                                </div>
                            </div>

                            @if ($imagenes)
                            <div class="row">
                                @foreach ($imagenes as $imagenes)
                                <div class="col-3 card me-1 mb-1 text-center">
                                    <img src="{{ $imagenes->temporaryUrl() }}">
                                </div>
                                @endforeach
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="formFileMultiple" class="form-label">Subir Imagenes</label>
                                <input class="form-control" type="file" multiple wire:model="imagenes"  required/>
                                @error('imagenes.*') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </form>
                        {{ $articulo->id }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire.click.prevent="cerrarModal()">Cerrar</button>
                    <button type="submit" id="mybutton" class="btn btn-primary" wire:click.prevent="administrarimagenes({{$articulo->id}})">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>