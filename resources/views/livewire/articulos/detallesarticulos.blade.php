<div>
 <div wire:ignore.self class="modal fade fade bd-example-modal-xl" id="exampleModaldetalles{{ $articulo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">
                    <label>
                        Articulo N° :{{ $articulo->id }}
                    </label>
                 </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="printThis{{ $articulo->id }}">
            <div class="modal-body">
                <div class="container">
                    <div class="row">   
                            <div class="col-md-12 text-right"> 
                             <h3>
                                 <label>
                                     Articulo N° :{{ $articulo->id }}                        
                                </label>
                            </h3>
                        </div>                  
                    </div>  
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Fecha de adquisición:</label>
                            <p>{{ $articulo->fechaadquisicion }}</p>
                        </div>
                        <div class="col-md-4 ">
                            <label for="">Código:</label>
                            <p>{{ $articulo->codigo }}</p>
                        </div>
                        <div class="col-md-4">
                            <label for="">N° Comprovante:</label>
                            <p>{{ $articulo->foliocomprobante }}</p>
                        </div>
                    </div>                  

                    <div class="row ">
                        <div class="col-md-6">
                            <div class="pb-3">
                                <label for="">Marca:</label>
                            <p>{{ $articulo->marca }}</p>
                            </div>
                            <div class="pb-3">
                                <label for="">Modelo:</label>
                            <p>{{ $articulo->modelo }}</p>
                            </div>
                            <div class="pb-3">
                                <label for="">N° de serie:</label>
                            <p>{{ $articulo->serie }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pb-3">
                                <label for="">Descripcón:</label>
                            <p>{{ $articulo->descripcion }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">   
                        <div class="col-md-8">  
                            <div class="row">   
                                <div class="col-md-6">
                                    <div class="pb-3">
                                <label for="">Costo de adquisición:</label>
                            <p>{{ $articulo->costodeadquisicion }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pb-3">
                                <label for="">Estado del Producto:</label>
                            <p>{{ $articulo->estado }}</p>
                                    </div>
                                </div>


                                <div class="col-md-12" wire:ignore>
                                    <div class="pb-3">
                                <label for="">Area:</label>
                            <p>{{ $articulo->area }}</p>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="pb-3">
                                <label for="">Encardao:</label>
                            <p>{{ $articulo->name }}</p>
                                    </div>
                                </div>

                            </div>  
                        </div>  
                        <div class="col-md-4">
                            <div class="pb-3">
                                <label for="">Observaciones:</label>
                            <p>{{ $articulo->observaciones }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">   
                        @foreach($articulo->imagenes as $imagen)
                        <div class="col-md-4">
                           <img src="/storage/{{ $imagen->imagenes }}" class="img-fluid img-thumbnail"  alt="">
                       </div>
                        @endforeach
                    </div>  
                </div>
            </div>
        </div>
            <div class="modal-footer">
                <button id="btnPrint{{ $articulo->id }}" type="button" class="btn btn-default"><i class="fa-solid fa-print" alt="Imprimir"></i></button>
            
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div>