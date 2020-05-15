<?php

namespace App\Http\Controllers\ControlDeStencil\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiConsume;
use App\Http\Controllers\Core\ApiLogin;
use App\Traits\ApiConsumeHandleTrait;

class AbmObservaciones extends Controller
{
    use ApiConsumeHandleTrait;

    public function GetList()
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("controldestencil/v1/abm/observaciones");
        $this->checkErrors($api,__FUNCTION__);
        return $api;
    }

    public function GetListByCodigo($codigo)
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("controldestencil/v1/abm/observaciones/codigo/{$codigo}");
        $this->checkErrors($api,__FUNCTION__);
        return $api;
    }

    public function Create($params)
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->post("controldestencil/v1/abm/observaciones/create",$params);
        $this->checkErrors($api,__FUNCTION__);
        return $api;
    }

    public function Delete($id)
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->post("controldestencil/v1/abm/observaciones/delete/{$id}");
        $this->checkErrors($api,__FUNCTION__);
        return $api;
    }

}
