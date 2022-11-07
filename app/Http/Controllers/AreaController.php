<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AreaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {

        return view('area.index');
    }
}
