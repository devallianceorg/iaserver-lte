<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiAuthMode;
use App\Http\Controllers\Core\ApiConsume;

class ApiUsers extends Controller
{
    public $authMode;
    public function __construct(ApiAuthMode $authMode)
    {
        $this->authMode= $authMode;
    }

    public function getAll($params=[])
    {
        $api = new ApiConsume();
        $api->setHost(env('IASERVER_AUTH'));
        $api->setAuth($this->authMode);

        $api->get("acl/users",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }

    public function getId($id,$params=[])
    {
        $api = new ApiConsume();
        $api->setHost(env('IASERVER_AUTH'));
        $api->setAuth($this->authMode);

        $api->get("acl/users/{$id}",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }
}