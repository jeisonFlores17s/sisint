<?php

namespace App\Exports\articulos;

use App\Models\Articulo;
use App\Models\User;
use App\Models\Area;
use App\Model\EstatuProducto;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Facades\DB;

class ExportTodosArticulos implements FromView, ShouldAutoSize, WithTitle
{
   public function view(): View
    {


        return view('exports.articulos.articulostodos', [
            'articulos' => Articulo::select('articulos.*', 'areas.area', 'users.name', 'estatusproductos.estatus')
        ->join('areas', 'areas.id', '=', 'articulos.area_id')
        ->join('users', 'users.id', '=', 'articulos.user_id')
        ->join('estatusproductos', 'estatusproductos.id', '=', 'articulos.estatu_id')
        ->orderBy('articulos.id', 'desc')
        ->get()
        ]);
    }

    public function title(): string
{
    return 'Articulos';
}
}
