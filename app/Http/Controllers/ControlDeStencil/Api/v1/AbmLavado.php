<?php

namespace App\Http\Controllers\ControlDeStencil\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiConsume;
use App\Traits\ApiDefaultAbmRouteTrait;

class AbmLavado extends Controller
{
    use ApiDefaultAbmRouteTrait;

    public function __construct()
    {
        $this->setAbmRoute('controldestencil/v1/abm/lavado');
    }

    public function getListByCodigo($codigo)
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("{$this->route}/codigo/{$codigo}");
        $this->checkErrors($api,__FUNCTION__);
        return $api;
    }
}
