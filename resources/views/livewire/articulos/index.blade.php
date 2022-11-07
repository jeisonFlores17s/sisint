<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Articulos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            @include('livewire.articulos.createarticulos')
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="btn-group dropright">
                <button type="button" class="btn btn-secondary btn-flat btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Exportar por
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item hover" href="#" wire:click="ExportarArticulosPorArea()"><i class="fa-solid fa-file-csv"></i> Exportar por areas</a>
                    <a class="dropdown-item hover" href="#" wire:click.prevent="ExportarArticulosPorEstatus()"><i class="fa-solid fa-file-csv"></i> Exportar por Estatus</a>
                    <a class="dropdown-item hover" href="#" wire:click.prevent="ExportArticulosTodos()"><i class="fa-solid fa-file-csv"></i> Exportar todos los articulos</a>
                    <div class="dropdown-divider"></div>
                </div>
            </div>
            <br><br>
        </div><!-- /.container-fluid -->
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
                   <th>Ver mas</th>
                   <th>Acciones</th>
               </tr>
           </thead>
           <tbody>
            @foreach($articulos as $key => $articulo)
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
                <td> {{ $articulo->estatus }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-secondary btn-flat" data-toggle="modal" data-target="#exampleModaldetalles{{ $articulo->id }}">
                      <i class="fa-solid fa-image" alt="administrar imagenes"></i>
                  </button> 
              </td>
              <td>    
                <div class="dropdown">
                  <button class="btn btn-secondary btn-sm btn-flat dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Acciones
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a href="#" class="dropdown-item text-center" data-toggle="modal" data-target="#exampleModalimagenes{{ $articulo->id }}">Administrar imagenes</a>
                    <a class="dropdown-item text-center" href="#" data-toggle="modal" data-target="#exampleModaledar" wire:click="editararticulo({{ $articulo->id }})"> Editar articulo <i class="fa-solid fa-pen-to-square" style="color:#9A7D0A;"></i>
                    </a>
                    <a class="dropdown-item text-center" href="#" wire:click="eliminararticulo({{ $articulo->id }})">
                     Eliminar articulo <i class="fa-regular fa-trash-can" style="color:#7B241C;"></i></a>
                 </div>
             </div>
         </td>
     </tr>
     @include('livewire.articulos.administrarimagenes')
     @include('livewire.articulos.detallesarticulos')
     @include('livewire.articulos.editararticulo')
     <script>    
        document.getElementById("btnPrint{{ $articulo->id }}").onclick = function () {
            printElement(document.getElementById("printThis{{ $articulo->id }}"));
        }

        function printElement(elem) {
            var domClone = elem.cloneNode(true);

            var $printSection = document.getElementById("printSection");

            if (!$printSection) {
                var $printSection = document.createElement("div");
                $printSection.id = "printSection";
                document.body.appendChild($printSection);
            }

            $printSection.innerHTML = "";
            $printSection.appendChild(domClone);
            window.print();
        }
    </script>
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
</div>

</div>
