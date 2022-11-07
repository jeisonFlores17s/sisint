<?php

namespace App\Http\Livewire\Articulos;

use Livewire\Component;
use App\Models\User;
use App\Models\Area;
use App\Models\Articulo;
use App\Models\Imagenesarticulo;
use App\Models\EstatuProducto;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use App\Exports\articulos\ArticulosPorArea;
use App\Exports\articulos\ArticuloPorEstatus;
use App\Exports\articulos\ExportTodosArticulos;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];
    protected $paginationTheme = 'bootstrap';

    public $imagenes = [];
    public $articulo_id;
    public $fechaadquisicion, $marca, $modelo,
    $serie,$codigo, $foliocomprobante, $descripcion, 
    $estado, $costodeadquisicion,
    $observaciones, $estatu_id;

    public $foo;
    public $search = '';
    public $page = 1;

    public $areas;
    public $area_id;
    public $user_id;
    public $users;
    public $updateMode = false;
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;


    public function mount()
    {
        $this->areas = Area::all();

        $this->getUserId();

    }

    public function updatedAreaId(){

        //dd('disparo el select');
        $this->getUserId();

    }

    public function getUserId(){

        if($this->area_id != ''){
            $this->users = User::where('area_id', $this->area_id)->get();
        }else {
            $this->users = [];
        }

    }


    public function render()
    {


        $articulos = DB::table('articulos')
        ->select('articulos.*','users.name', 'areas.area', 'estatusproductos.estatus') 
        ->join('areas', 'areas.id', '=', 'articulos.area_id')
        ->join('users', 'users.id', '=', 'articulos.user_id')
        ->join('estatusproductos', 'estatusproductos.id', '=', 'articulos.estatu_id')
        ->where('marca', 'like', '%'.$this->search.'%')
        ->orwhere('codigo', 'like', '%'.$this->search.'%')
        ->orwhere('areas.area', 'like', '%'.$this->search.'%')
        ->orwhere('users.name', 'like', '%'.$this->search.'%')
        ->orderBy('articulos.id', 'desc')
        ->paginate(10);

        $estatuss = DB::table('estatusproductos')
        ->select('estatusproductos.id', 'estatusproductos.estatus')
        ->get();

        //dd($articulos);

        foreach ($articulos as $key => $articulo) {
            //$arrayimagenes[] = 'nombre';
            //dd($articulo->id);
            $queryimagenes = DB::table('imagenesarticulos')
            ->where('articulos_id','=', $articulo->id)
            ->get();
            //dd($queryimagenes); 
            $articulo->imagenes = $queryimagenes;     
        };
        //dd($articulos);
        return view('livewire.articulos.index',[
            'articulos' => $articulos,
            'estatuss' => $estatuss,
        ]);
    }

    public function resetInputFields()
    {
        $this->fechaadquisicion = "";
        $this->marca = "";
        $this->modelo = "";
        $this->serie = "";
        $this->codigo = "";
        $this->foliocomprobante = "";
        $this->descripcion = "";
        $this->estado = "";
        $this->costodeadquisicion = "";
        $this->area_id = "";
        $this->user_id = "";
        $this->observaciones = "";
    }
    public function creararticulo()
    {
        //dd($request);
        $validateDate = $this->validate([
            'fechaadquisicion' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'serie' => 'required',
            'codigo' => 'required|unique:articulos',
            'foliocomprobante' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'costodeadquisicion' => 'required',
            'area_id' => 'required',
            'user_id' => 'required',
            'estatu_id' => 'required',
            'observaciones' => 'required',
        ]);

        $creararticulo = Articulo::create($validateDate);
        $conseguir_id = $creararticulo->id;

        $this->alert('success', 'Articulo Actualizado!', [
           'position' => 'top-start',
           'timer' => 3000,
           'toast' => true,

       ]);
        $this->emit('actualizarArticulo');
        $this->resetInputFields();
    }

    public function editararticulo($id)
    {
        $artiuculoed = Articulo::findOrFail($id);
        $this->articulo_id = $id;
        $this->fechaadquisicion = $artiuculoed->fechaadquisicion;
        $this->marca = $artiuculoed->marca;
        $this->modelo = $artiuculoed->modelo;
        $this->serie = $artiuculoed->serie;
        $this->codigo = $artiuculoed->codigo;
        $this->foliocomprobante = $artiuculoed->foliocomprobante;
        $this->descripcion = $artiuculoed->descripcion;
        $this->estado = $artiuculoed->estado;
        $this->costodeadquisicion = $artiuculoed->costodeadquisicion;
        $this->area_id = $artiuculoed->area_id;
        $this->estatu_id = $artiuculoed->estatu_id;
        $this->observaciones = $artiuculoed->observaciones;

    }
    public function actualizararticulo(Request $request)
    {

        $validateDate = $this->validate([
            'fechaadquisicion' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'serie' => 'required',
            'codigo' => 'required',
            'foliocomprobante' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'costodeadquisicion' => 'required',
            'area_id' => 'required',
            'estatu_id' => 'required',
            'observaciones' => 'required',
        ]);
        $artiuculoed = Articulo::find($this->articulo_id);
        $artiuculoed->update([
            'fechaadquisicion' => $this->fechaadquisicion ,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'serie' => $this->serie,
            'codigo' => $this->codigo,
            'foliocomprobante' => $this->foliocomprobante,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
            'costodeadquisicion' => $this->costodeadquisicion,
            'area_id' => $this->area_id,
            'estatu_id' => $this->estatu_id,
            'observaciones' => $this->observaciones,
        ]);
 //$this->updateMode = false;
    //dd($area);
        $this->alert('success', 'Modelo Actualizado!', [
           'position' => 'top-start',
           'timer' => 3000,
           'toast' => true,

       ]);
        $this->emit('actualizarArticulo');
        $this->resetInputFields();
    }
    public function cerrarModal(){
        $this->resetInputFields();
    }

    public function eliminararticulo($id)
    {


        //dd($eliminarimagenes); 
        Articulo::find($id)->delete();

        $this->alert('info', 'Articulo Eliminado!', [
         'position' => 'top-start',
         'timer' => 3000,
         'toast' => true,
     ]);
    }

    public function resetInputFieldsImagen()
    {
        $imagenes = "";

    }

    public function administrarimagenes(Request $request, $articulo)
    {

        //dd($articulo);
        $validar = $this->validate([
            'imagenes.*' => 'image|required',
            //'articulos_id' => 'required',
        ]);

        foreach ($this->imagenes as $imagene) {
            $imageNombre = $imagene->getClientOriginalName();
            $imageNombre = $imagene->store('uploads', 'public');

            $imagenesarticulos = Imagenesarticulo::create([
                'articulos_id'=> $articulo,
                'imagenes' => $imageNombre,
            ]);
                    //clean up
            $this->imagenes = null;
            $this->emit('actualizarArticulo');
            $this->alert('success', 'imagenes Subidas Correctamente!', [
               'position' => 'top-start',
               'timer' => 3000,
               'toast' => true,
           ]);
        }
    }
    public function ExportarArticulosPorArea()
    {

        return (new ArticulosPorArea())->download('por_areas.xlsx');
    }

    public function ExportarArticulosPorEstatus()
    {

        return (new ArticuloPorEstatus())->download('por_status.xlsx');
    }

    public function resetInputEstatus()
    {
        $this->estatus = "";
    }

    public function CrearEstatus()
    {
        $validateDate = $this->validate([
            'estatus' => 'required',

        ]);

        $crearestatus = EstatuProducto::create($validateDate);

        $this->resetInputEstatus();

        $this->alert('success', 'Estatu Subido Correctamente!', [
           'position' => 'top-start',
           'timer' => 3000,
           'toast' => true,
       ]);
    }

    public function editarEstatus($id)
    {
        $estado_id = EstatuProducto::findOrFail($id);
        $this->estado_id = $id;
        $this->estatus = $estado_id->estatus;
        $this->updateMode = true;
    }

    public function actualizarEstatus()
    {
                $validateDate = $this->validate([
            'estatus' => 'required',

        ]);
        $estado_id = EstatuProducto::find($this->estado_id);
        $estado_id->update([
            'estatus' => $this->estatus,
        ]);

        

        $this->resetInputEstatus();

        $this->alert('success', 'Estatu Editado Correctamente!', [
           'position' => 'top-start',
           'timer' => 3000,
           'toast' => true,
       ]);
    }
        public function cancelareditarestatus()
    {
        $this->updateMode = false;
        $this->resetInputEstatus();
    }

            public function EliminarEstatu($id)
    {
       EstatuProducto::find($id)->delete();

       $this->alert('success', 'Estatu Eliminado Correctamente!', [
           'position' => 'top-start',
           'timer' => 3000,
           'toast' => true,
       ]);
    }

    public function ExportArticulosTodos()
    {

        return Excel::download(new ExportTodosArticulos, 'todos_los_articulos.xlsx');
    }
}