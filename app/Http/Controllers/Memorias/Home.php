<?php

namespace App\Http\Controllers\Memorias;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiConsume;
use Carbon\Carbon;

class Home extends Controller
{
    public function index()
    {
        $programa = $this->cartelera();
        return view('memorias.index',compact('programa'));
    }

    public function cartelera($filtrar_modelo="",$filtrar_lote="",$filtrar_op="") 
    {
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("memorias/v1/cartelera/{$filtrar_modelo}/{$filtrar_lote}/{$filtrar_op}");

        if($api->hasError()) { return $this->error = $api->getError(); }
        $response = $api->response();
        $cartelera = collect($response);

        return $cartelera;
    }
}
