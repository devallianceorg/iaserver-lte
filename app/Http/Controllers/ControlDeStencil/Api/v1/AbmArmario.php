<?php

namespace App\Http\Controllers\ControlDeStencil\Api\v1;

use App\Http\Controllers\Controller;
use App\Traits\ApiDefaultAbmRouteTrait;

class AbmArmario extends Controller
{
    use ApiDefaultAbmRouteTrait;

    public function __construct()
    {
        $this->setAbmRoute('controldestencil/v1/abm/armario');
    }
}
