<?php

namespace App\Exports\area;

use App\Models\Area;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;


class ExportarArea implements FromView, ShouldAutoSize, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.areas.exportartodos', [
            'areas' => Area::all()
        ]);
    }

    public function title(): string
{
    return 'Areas';
}
}
