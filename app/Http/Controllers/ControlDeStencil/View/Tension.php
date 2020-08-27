<?php

namespace App\Http\Controllers\ControlDeStencil\View;

use App\Http\Controllers\ControlDeStencil\Api\v1\AbmTension;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiLogin;

class Tension extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.api');
    }

    public function create()
    {
        $id_operador = ApiLogin::user('id');

        $params = [
            'id_operador' => $id_operador,
            'tension' => request('tension'),
            'codigo' => request('codigo'),
        ];

        $api = new AbmTension();
        $apiCreate = $api->create($params);
        $create = $apiCreate->response();

        $render = compact('create');

        return redirect()->back();
    }

    public function delete($id)
    {
        $api  = new AbmTension();
        $apiDelete = $api->delete($id);
        $delete = $apiDelete->response();

        $render = compact('delete');

        return redirect()->back();
    }
}
