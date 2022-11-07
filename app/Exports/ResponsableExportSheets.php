<?php

namespace App\Exports;

use App\Models\Area;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;

class ResponsableExportSheets implements FromQuery, WithTitle, WithHeadings, ShouldAutoSize
{
  private $areas;
  private $area;

  public function __construct(Area $area)
  {
    $this->area = $area;
  }

public function query()
{
    return DB::table('users')
    ->select( 'users.id', 'users.name', 'users.email', 'areas.area')
    ->join('areas', 'areas.id', '=', 'area_id')
    ->where('users.area_id', '=', $this->area->id)
    ->orderBy('users.id', 'desc');

}

public function headings(): array
{

    return [
        '#',
        'Nombre del responsable',
        'Correo del responsable',
        'Area encargada',
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
