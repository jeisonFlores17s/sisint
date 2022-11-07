<?php

namespace App\Http\Livewire\Area;

use Livewire\Component;
use App\Models\Area;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AreaExport;
use App\Exports\area\ExportarArea;



class Index extends Component
{

    public  $area, $area_id, $total_areas;
    public $updateMode = false;
    public $search;
    protected $queryString = ['search'];

    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $this->total_areas = DB::table('areas')->count();
        $areas = Area::where('area', 'like', '%'.$this->search.'%')
                ->orderBy('id', 'DESC')
                ->paginate(5);
        return view('livewire.area.index',[
            'areas' => $areas,
        ]);
    }

    public function resetInputFields()
    {
        $this->area = "";
    }

    public function subirarea()
    {
        $validateDate = $this->validate([
            'area' => 'required',
        ]);

        Area::create($validateDate);

        $this->alert('success', 'Area Creada!', [
         'position' => 'bottom-endt',
         'timer' => 3000,
         'toast' => true,

     ]);

        $this->emit('actualizarArea');

        $this->resetInputFields();

    }

    public function editar($id)
    {
        $area1 = Area::findOrFail($id);
        $this->area_id = $id;
        $this->area = $area1->area;

    }

    public function cancelar()
    {
        $this->resetInputFields();
    }

    public function actualizar(Request $request)
    {
        $validateDate = $this->validate([
            'area' => 'required',
        ]);
        $area1 = Area::find($this->area_id);
        $area1->update([
            'area' => $this->area,
        ]);

        $this->emit('actualizarArea');
        $this->alert('success', 'Area Actualizada!', [
           'position' => 'bottom-end',
           'timer' => 3000,
           'toast' => true,

       ]);
        $this->resetInputFields();
    }

    public function eliminar($id)
    {
        Area::find($id)->delete();

        $this->alert('info', 'Area Eliminada!', [
         'position' => 'bottom-end',
         'timer' => 3000,
         'toast' => true,
     ]);
        
    }
    public function fileExport()
    {

        return (new AreaExport())->download('areas.xlsx');
    }
    public function AreaTodosExport()
    {

        return Excel::download(new ExportarArea, 'todos_areas.xlsx');
    }
}
