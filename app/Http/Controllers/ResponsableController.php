<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class ResponsableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   

       if(Auth::User()->rol == 'admin'){
        return view('responsables.responsablesindex');
    }else{
        return view('error.error404');
    };

    
    }
}


