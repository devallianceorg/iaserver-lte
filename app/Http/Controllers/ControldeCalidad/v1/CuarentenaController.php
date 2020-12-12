<?php

namespace App\Http\Controllers\ControldeCalidad\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiConsume;


class CuarentenaController extends Controller
{
    public function index()
    {
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("controldecalidad/v1/cuarentena");

        if($api->hasError()) { return $this->error = $api->getError(); }
        $response = $api->response();
        return view('controldecalidad.cuarentena.index', $response);
    }

    public function createView()
    {
        return view('controldecalidad.cuarentena.create');
    }

    public function editView()
    {
        return view('controldecalidad.cuarentena.edit');
    }
}
