<?php

namespace App\Http\Controllers\Npmpicker\Api\v1;

use App\Http\Controllers\Api\Util\ApiConsume;
use App\Http\Controllers\Controller;

class Npmpicker extends Controller
{
    public function GetLinea($fecha,$id_linea,$turno)
    {
        $params = [
            'id_linea' => $id_linea,
            'turno' => $turno,
            'fecha' => '"'.$fecha.'"',
            'mode'=> 'GetAll'
        ];
        
        // Consume API
        $uri = 'iaserver-v2';
        $api = new ApiConsume($uri);
        $api->get('aplicacion/npmpicker/jsonservice/npmpicker.php',$params);
        if($api->hasError()) { return $api->getError(); }

        return $api->response();
    }

    public function GetStat($id_stat=null)
    {
        $params = [
            'id_stat' => $id_stat,
            'mode'=> 'GetFeedersInestables'
        ];

        // Consume API
        $uri = 'iaserver-v2';
        $api = new ApiConsume($uri);
        $api->get('aplicacion/npmpicker/jsonservice/npmpicker.php',$params);
        if($api->hasError()) { return $api->getError(); }

        return $api->response();
    }

}
