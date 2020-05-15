<?php

namespace App\Http\Controllers\ControlDeStencil\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiConsume;
use App\Traits\ApiConsumeHandleTrait;

class AbmArmario extends Controller
{
    use ApiConsumeHandleTrait;

    public function GetList()
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("controldestencil/v1/abm/armario");
        $this->checkErrors($api,__FUNCTION__);
        return $api;
    }
}
