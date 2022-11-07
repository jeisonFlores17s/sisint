<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    public function index()
    {
        return view('portafolio.portafolio');
    }

    public function administrarportafolio()
    {
        return view('portafolio.administrar.index');
    }
}
