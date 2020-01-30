<?php

namespace App\Http\Controllers\Npmpicker\Api\v1;

use App\Http\Controllers\Core\ApiConsume;
use App\Http\Controllers\Controller;

class Npmpicker extends Controller
{
    public function GetLinea($fecha,$id_linea,$turno)
    {        
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("npmpicker/v1/info/{$fecha}/{$id_linea}/{$turno}");
        if($api->hasError()) { return $api->getError(); }

        return $api->response();
    }

    public function GetStat($id_stat=null)
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("npmpicker/v1/stat/{$id_stat}");
        if($api->hasError()) { return $api->getError(); }

        return $api->response();
    }

}
