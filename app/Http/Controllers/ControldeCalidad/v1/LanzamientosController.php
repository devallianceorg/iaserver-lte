<?php

namespace App\Http\Controllers\ControldeCalidad\v1;

use App\Http\Controllers\Controller;

class LanzamientosController extends Controller
{
    public function index()
    {
        return view('controldecalidad.lanzamientos.index');
    }
}
