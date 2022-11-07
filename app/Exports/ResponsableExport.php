<?php

namespace App\Exports;

use App\Models\Area;
use App\Models\Responsable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;

class ResponsableExport implements WithMultipleSheets
{
 use Exportable;

    private $areas;


    public function sheets(): array
    {
        $sheets = [];
        $activities = Area::where("id", ">=", 1)->get();

        //dd($activities);

        foreach ($activities as $areas) {
            //dd($areas->area);
            $sheets[] = new ResponsableExportSheets($areas);
        }

        return $sheets;
    }
}
