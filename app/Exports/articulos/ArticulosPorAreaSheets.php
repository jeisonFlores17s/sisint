<?php

namespace App\Exports\articulos;

use App\Models\Area;
use App\Models\Articulo;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;

class articulosporareaSheets implements FromQuery, WithTitle, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
     private $areas;
    private $area;
    public function __construct(Area $area)
    {
        $this->area = $area;
    }

    public function query()
    {
         return DB::table('articulos')
    ->select( 'articulos.id', 'articulos.fechaadquisicion', 'articulos.marca', 'articulos.modelo', 'articulos.serie', 'articulos.codigo', 'articulos.foliocomprobante', 'articulos.descripcion', 'articulos.estado', 'articulos.costodeadquisicion', 'articulos.observaciones', 'articulos.estatus', 'articulos.created_at', 'areas.area')
    ->join('areas', 'areas.id', '=', 'articulos.area_id')
    ->where('articulos.area_id', '=', $this->area->id)
    ->orderBy('articulos.id', 'desc');
    }

    public function headings(): array
    {

        return [
            '#',
            'Fecha de adquisción',
            'Marca',
            'Modelo',
            'Serie',
            'Código',
            'N° Comprovante',
            'Descripción',
            'estado',
            'costo de adquisición',
            'observaciones',
            'estatus',
            'Fecha de creación',
            'area',

        ];
    }


    public function title(): string
    {
        return ''. $this->area->area;
    }

}
