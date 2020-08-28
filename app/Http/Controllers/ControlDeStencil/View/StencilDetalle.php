<?php

namespace App\Http\Controllers\ControlDeStencil\View;

use App\Http\Controllers\ControlDeStencil\Api\v1\AbmLavado;
use App\Http\Controllers\ControlDeStencil\Api\v1\AbmObservaciones;
use App\Http\Controllers\ControlDeStencil\Api\v1\AbmStencil;
use App\Http\Controllers\ControlDeStencil\Api\v1\AbmTension;
use App\Http\Controllers\Controller;

class StencilDetalle extends Controller
{
    public function index($codigo)
    {
        $abmStencil = new AbmStencil();

        $getByCodigo = $abmStencil->getByCodigo($codigo);
        $stencil = $getByCodigo->response();

        $render = compact('stencil');

        return view('controldestencil.stencil_detalle',$render);
    }
}
