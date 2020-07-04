<?php

namespace App\Http\Controllers\ControlDePlacas;

use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('controldeplacas.index');
    }
}