<?php

namespace App\Http\Controllers\ControlDeStencil\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiConsume;
use App\Traits\ApiConsumeHandleTrait;

class AbmStencil extends Controller
{
    use ApiConsumeHandleTrait;

    public function GetList($params=[])
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("controldestencil/v1/abm/stencil",$params);
        $this->checkErrors($api,__FUNCTION__);
        return $api;
    }

    public function GetByCodigo($codigo)
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("controldestencil/v1/abm/stencil/codigo/{$codigo}");
        $this->checkErrors($api,__FUNCTION__);
        return $api;
    }
}
