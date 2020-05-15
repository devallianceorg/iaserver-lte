<?php

namespace App\Http\Controllers\ControlDeStencil\View;

use App\Http\Controllers\ControlDeStencil\Api\v1\AbmLavado;
use App\Http\Controllers\ControlDeStencil\Api\v1\AbmObservaciones;
use App\Http\Controllers\ControlDeStencil\Api\v1\AbmStencil;
use App\Http\Controllers\Controller;

class StencilDetalle extends Controller
{
    public function index($codigo)
    {
        $abmStencil = new AbmStencil();
        $abmObservaciones = new AbmObservaciones();
        $abmLavado = new AbmLavado();

        $getByCodigo = $abmStencil->getByCodigo($codigo);
        $getObservacionesByCodigo = $abmObservaciones->getListByCodigo($codigo);
        $getLavadosByCodigo = $abmLavado->getListByCodigo($codigo);

        $stencil = $getByCodigo->response();
        $observaciones = $getObservacionesByCodigo->response();
        $lavados = $getLavadosByCodigo->response();

        $render = compact('stencil','observaciones','lavados');

        return view('controldestencil.stencil_detalle',$render);
    }
}
