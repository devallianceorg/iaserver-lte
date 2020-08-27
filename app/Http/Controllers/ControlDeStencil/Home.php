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

        // En caso de existir error, el mismo es logueado previamente
        // De igual manera, la siguiente linea permite
        // visualizar el error de consumo de API
        if(request('apidebug')) {
            if($list->hasError()) return $list->getError();
        }

        $stenciles = $list->response();
        $render = compact('stenciles');
        return view('controldestencil.index',$render);
    }
}
