<?php

namespace App\Exports\articulos;

use App\Models\Articulo;
use App\Models\Area;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class articulosporarea implements WithMultipleSheets
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
            $sheets[] = new articulosporareaSheets($areas);
        }

        return $sheets;
    }
}
