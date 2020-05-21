<?php

namespace App\Http\Controllers\ControlDeStencil\View;

use App\Http\Controllers\ControlDeStencil\Api\v1\AbmObservaciones;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiLogin;

class Observaciones extends Controller
{
    public function index()
    {
        $abmObservaciones = new AbmObservaciones();
        $getObservaciones = $abmObservaciones->getList();
        $observaciones = $getObservaciones->response();

        $render = compact('observaciones');

        return view('controldestencil.observaciones',$render);
    }

    public function create()
    {
        $id_operador = ApiLogin::user('id');

        $params = [
            'id_operador' => $id_operador,
            'texto' => request('texto'),
            'codigo' => request('codigo')
        ];

        $api = new AbmObservaciones();
        $apiCreate = $api->create($params);
        $create = $apiCreate->response();

        $render = compact('create');

        return redirect()->back();
    }

    public function delete($id)
    {
        $api  = new AbmObservaciones();
        $apiDelete = $api->delete($id);
        $delete = $apiDelete->response();

        $render = compact('delete');

        return redirect()->back();
    }
}
