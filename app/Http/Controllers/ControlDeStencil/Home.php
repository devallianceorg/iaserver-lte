<?php

namespace App\Http\Controllers\ControlDeStencil;

use App\Http\Controllers\ControlDeStencil\Api\v1\AbmLavado;
use App\Http\Controllers\ControlDeStencil\Api\v1\AbmObservaciones;
use App\Http\Controllers\ControlDeStencil\Api\v1\AbmStencil;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiLogin;

class Home extends Controller
{
    public function index()
    {
        $api = new AbmStencil();

        $params = [
          'codigo' => request('codigo'),
          'keyword' => request('keyword'),
        ];

        $list = $api->GetList($params);
        $stenciles = $list->response();

        $render = compact('stenciles');

        return view('controldestencil.index',$render);
    }

    public function detalle($codigo)
    {
        $abmStencil = new AbmStencil();
        $abmObservaciones = new AbmObservaciones();
        $abmLavado = new AbmLavado();

        $getByCodigo = $abmStencil->GetByCodigo($codigo);
        $getObservacionesByCodigo = $abmObservaciones->GetListByCodigo($codigo);
        $getLavadosByCodigo = $abmLavado->GetLavadoByCodigo($codigo);

        $stencil = $getByCodigo->response();
        $observaciones = $getObservacionesByCodigo->response();
        $lavados = $getLavadosByCodigo->response();

        $render = compact('stencil','observaciones','lavados');

        return view('controldestencil.stencil_detalle',$render);
    }

    public function observaciones()
    {
        $abmObservaciones = new AbmObservaciones();
        $getObservaciones = $abmObservaciones->GetList();
        $observaciones = $getObservaciones->response();

        $render = compact('observaciones');

        return view('controldestencil.observaciones',$render);
    }

    public function observacionesCreate()
    {
        $id_operador = ApiLogin::user('id');

        $params = [
            'id_operador' => $id_operador,
            'texto' => request('texto'),
            'codigo' => request('codigo')
        ];

        $abmObservaciones = new AbmObservaciones();
        $addObservacion = $abmObservaciones->Add($params);
        $observaciones = $addObservacion->response();

        $render = compact('observaciones');

        return redirect()->back();
    }

    public function observacionesDelete($id)
    {
        $abmObservaciones = new AbmObservaciones();
        $addObservacion = $abmObservaciones->Delete($id);
        $response = $addObservacion->response();

        $render = compact('response');

        return redirect()->back();
    }

    public function lavados()
    {
        $abmLavados = new AbmLavado();
        $getLavados = $abmLavados->GetList();
        $lavados= $getLavados->response();

        $render = compact('lavados');

        return view('controldestencil.lavados',$render);
    }

}
