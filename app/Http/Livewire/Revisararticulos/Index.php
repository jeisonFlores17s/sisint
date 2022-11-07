<?php

namespace App\Http\Livewire\Revisararticulos;

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

class Index extends Component
{

    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];
    public $foo;
    public $search = '';
    public $page = 1;

    public $observaciones, $estatu_id, $obsestatu_id;

        protected $messages = [
        'observaciones.required' => 'El campo Observaciones no puede estar vacío.',
        'estatu_id.required' => 'El campo Estatus no puede estar vacío, por favor ingrese algún valor.',
    ];

    use LivewireAlert;
    use WithPagination;

    public function render()
    {
        $authuser = Auth()->user()->id;
//dd($authuser);
        $estatuss = DB::table('estatusproductos')
        ->select('estatusproductos.id', 'estatusproductos.estatus')
        ->get();       

        $articulos = DB::table('articulos')
        ->select('articulos.*', 'users.name', 'areas.area', 'estatusproductos.estatus') 
        ->join('areas', 'areas.id', '=', 'articulos.area_id')
        ->join('users', 'users.id', '=', 'articulos.user_id')
        ->join('estatusproductos', 'estatusproductos.id', '=', 'articulos.estatu_id')
        ->orwhere('codigo', 'like', '%'.$this->search.'%')
        ->where('articulos.user_id', $authuser) 
        ->orderBy('articulos.id', 'desc')
        ->paginate(10);
        return view('livewire.revisararticulos.index',[
            'articulos' => $articulos, 
            'estatuss' => $estatuss,
        ]);
    }
    public function editarestatusyobs($id)
    {
        $obsestatu = Articulo::findOrFail($id);
        $this->obsestatu_id = $id;
        $this->estatu_id = $obsestatu->estatu_id;
        $this->observaciones = $obsestatu->observaciones;
    }

    public function actualizarestatusyobs()
    {
        $validateDate = $this->validate([
            'estatu_id' => 'required',
            'observaciones' => 'required',
        ]);

        $obsestatu = Articulo::find($this->obsestatu_id);
        //dd($obsestatu);
        $obsestatu->update([
 'estatu_id' => $this->estatu_id ,
            'observaciones' => $this->observaciones,
        ]);
        //dd($editarestatusyobs1);
        $this->alert('success', 'Actualizado!', [
           'position' => 'top-start',
           'timer' => 3000,
           'toast' => true,
            ]);

        $this->emit('Revisararticulo');
        }
    }
