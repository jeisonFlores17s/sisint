<?php

namespace App\Exports;

use App\Models\Area;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AreaMultipleSheets implements FromQuery, WithTitle, WithHeadings, ShouldAutoSize
{


    private $areas;
    private $area;
    public function __construct(Area $area)
    {
        $this->area = $area;
    }

    public function query()
    {
        return Area::query()->where('id', '=', $this->area->id);
    }

    public function headings(): array
    {

        return [
            '#',
            'areas',
            'fecha de creación',
            'fecha de actualización',
        ];
    }

    public function map($area): array
    {
        return [
            $area->id,
            $area->area,
        ];
    }

    public function title(): string
    {
        return ''. $this->area->area;
    }




}
