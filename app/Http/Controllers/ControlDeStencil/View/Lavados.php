<?php

namespace App\Http\Controllers\ControlDeStencil\View;

use App\Http\Controllers\ControlDeStencil\Api\v1\AbmLavado;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiLogin;

class Lavados extends Controller
{
    public function index()
    {
        $api = new AbmLavado();
        $getLavados = $api->getList();
        $lavados= $getLavados->response();

        $render = compact('lavados');

        return view('controldestencil.lavados',$render);
    }

    public function create()
    {
        $id_operador = ApiLogin::user('id');

        $params = [
            'id_operador' => $id_operador,
            'codigo' => request('codigo')
        ];

        $api = new AbmLavado();
        $apiCreate = $api->create($params);
        $create = $apiCreate->response();

        return redirect()->back();
    }

    public function delete($id)
    {
        $api = new AbmLavado();
        $apiDelete = $api->delete($id);
        $delete = $apiDelete->response();

        return redirect()->back();
    }
}
