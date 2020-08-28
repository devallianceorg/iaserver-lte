<?php

namespace App\Http\Controllers\ControlDeStencil\View;

use App\Http\Controllers\ControlDeStencil\Api\v1\AbmLavado;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiLogin;

class Lavados extends Controller
{
    public function index()
    {
        return view('controldestencil.lavados');
    }
}
