<?php

namespace App\Exports\articulos;

use App\Models\Articulo;
use App\Models\EstatuProducto;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;

class ArticuloPorEstatusSheets implements FromQuery, WithTitle, WithHeadings, ShouldAutoSize
{
/**
    * @return \Illuminate\Support\Collection
    */
   private $areas;
    private $estatuproducto;
    public function __construct(EstatuProducto $estatuproducto)
    {
        $this->estatuproducto = $estatuproducto;
    }

    public function query()
    {

        return DB::table('articulos')
                ->select('articulos.id', 'articulos.fechaadquisicion', 'articulos.marca', 'articulos.modelo', 'articulos.serie', 'articulos.codigo', 'articulos.foliocomprobante', 'articulos.descripcion', 'articulos.estado', 'articulos.costodeadquisicion', 'articulos.observaciones', 'articulos.estatu_id', 'articulos.created_at')
                ->where('articulos.estatu_id', '=', $this->estatuproducto->id)
                ->orderBy('id', 'desc');
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
        ];
    }


    public function title(): string
    {
        return ''. $this->estatuproducto->estatus;
    }
}
