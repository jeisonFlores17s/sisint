<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ArticulosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('articulos.arindex');
    }

        public function revisararticulos()
    {
        return view('articulos.revisararticulos');
    }


}
