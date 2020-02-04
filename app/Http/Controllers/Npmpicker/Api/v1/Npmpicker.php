<?php

namespace App\Http\Controllers\Npmpicker\Api\v1;

use App\Http\Controllers\Core\ApiConsume;
use App\Http\Controllers\Controller;

class Npmpicker extends Controller
{
    private $errors = [];

    public function GetPing($fecha)
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("npmpicker/v1/resume/{$fecha}");
        $this->prepareError($api,__FUNCTION__);
        return $api;
    }

    public function GetFeeders($fecha,$id_linea,$turno='M',$estado='inestable')
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("npmpicker/v1/resume/{$fecha}/{$id_linea}/{$turno}/{$estado}");
        $this->prepareError($api,__FUNCTION__);
        return $api;
    }

    public function GetFeederDetail($id_stat)
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("npmpicker/v1/stat/{$id_stat}");
        $this->prepareError($api,__FUNCTION__);
        return $api;
    }

    // Gestion de errores al consumir API
    public function fails() {
        if(count($this->errors)>0) {
            return true;
        }
        return false;
    }

    public function errors() {
        return $this->errors;
    }

    private function prepareError($api,$fx) {
        if($api->hasError()) { $this->errors[$fx] = $api->getError(); }
    }

}
