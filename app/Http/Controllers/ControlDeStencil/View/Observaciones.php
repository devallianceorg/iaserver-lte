<?php

namespace App\Http\Controllers\ControlDeStencil\View;

use App\Http\Controllers\ControlDeStencil\Api\v1\AbmObservaciones;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiLogin;

class Observaciones extends Controller
{
    public function index()
    {
        return view('controldestencil.observaciones');
    }
}
