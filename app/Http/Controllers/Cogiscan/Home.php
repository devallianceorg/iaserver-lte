<?php

namespace App\Http\Controllers\Cogiscan;

use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        $impresiones = [];

        $render = compact('impresiones');

        return view('cogiscan.cogiscan_utilities.index',$render);
    }
}
