<?php
namespace App\Http\Controllers\SMTDatabase\Api\v1\Componentes;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiConsume;
use Illuminate\Http\Request;

class ComponentesView extends Controller
{
    public function findComponente(Request $request) {
        $componente = $request->input('componente');
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("smtdatabase/v1/material/buscar/{$componente}");
        
        if($api->hasError()) { return $this->error = $api->getError(); }
        $response = $api->response();

        return view('smtdatabase.componentes.buscar',["materiales"=>$response["query"]]);
    }

    public function findSemielaborado(Request $request) {
        $componente = $request->input('componente');
        $likeMode = true;
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("smtdatabase/v1/material/buscar/{$componente}/{$likeMode}");
        
        if($api->hasError()) { return $this->error = $api->getError(); }
        $response = $api->response();

        // return $response;
        return view('smtdatabase.componentes.buscar',["materiales"=>$response["query"]]);
    }

    public function allSemielaboradoByModelo(Request $request) {
        $modelo = $request->input('modelo');
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("smtdatabase/v1/semielaborado/buscar/{$modelo}");
        
        if($api->hasError()) { return $this->error = $api->getError(); }
        $response = $api->response();
        $materiales = collect($response);

        $output = compact("modelo","materiales");

        return view('smtdatabase.componentes.semi_por_modelo',$output);
    }

    public function findByBom($semi)
    {
        //API
        $output = "";
        return $output;
    }
}
