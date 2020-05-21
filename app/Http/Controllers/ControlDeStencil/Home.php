<?php

namespace App\Http\Controllers\ControlDeStencil;

use App\Http\Controllers\ControlDeStencil\Api\v1\AbmStencil;
use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
        $api = new AbmStencil();

        $params = [
          'codigo' => request('codigo'),
          'keyword' => request('keyword'),
        ];

        $list = $api->getList($params);
        $stenciles = $list->response();

        $render = compact('stenciles');

        return view('controldestencil.index',$render);
    }
}
