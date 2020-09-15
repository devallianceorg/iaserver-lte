<?php

namespace App\Http\Controllers\Memorias\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiConsume;


class MemoriasFind extends Controller
{
    public static function findMemoryByOp($op)
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get("smtdatabase/v1/ordentrabajo/find/memorybyop/{$op}");
        return $api;
    }

}
