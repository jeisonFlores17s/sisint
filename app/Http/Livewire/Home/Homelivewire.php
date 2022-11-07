<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Area;
use App\Models\Articulo;
use App\Models\User;


class Homelivewire extends Component
{
    public $total_areas, $total_articulos, $usuarios;

    public function render()
    {
        $this->total_areas = DB::table('areas')->count();
        $this->total_articulos = DB::table('articulos')->count();
        $this->total_users = DB::table('users')->count();

        return view('livewire.home.homelivewire');
    }
}
