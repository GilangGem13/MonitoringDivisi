<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewadmin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function selamatdatang(Request $request){
        return view('Dashboard');
    }
}
