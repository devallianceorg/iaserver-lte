<?php

namespace App\Http\Controllers\ControldeConsumibles;

use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        return view('controldeconsumibles.index');
    }

    public function clienteIndex()
    {
        return view('controldeconsumibles.cliente.index');
    }
}