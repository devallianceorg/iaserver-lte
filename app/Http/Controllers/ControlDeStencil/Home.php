<?php

namespace App\Http\Controllers\ControlDeStencil;

use App\Http\Controllers\ControlDeStencil\Api\v1\AbmStencil;
use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('controldestencil.index');
    }
}
