<?php

namespace App\Exports\responsable;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class ResponsableTodosExport implements FromView, ShouldAutoSize, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.responsables.responsablestodos', [
            'users' => User::all()
        ]);
    }

    public function title(): string
{
    return 'Responsables';
}
}
