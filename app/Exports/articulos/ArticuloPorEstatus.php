<?php

namespace App\Exports\articulos;

use App\Models\Articulo;
use App\Models\EstatuProducto;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;;

class ArticuloPorEstatus implements WithMultipleSheets
{
  use Exportable;

    private $estatusproductos;


    public function sheets(): array
    {
        $sheets = [];
        $activities = EstatuProducto::where("id", ">=", 1)->get();

        //dd($activities);

        foreach ($activities as $estatusproductos) {
            //dd($estatusproductos);
            $sheets[] = new ArticuloPorEstatusSheets($estatusproductos);
        }

        return $sheets;
    }
}
