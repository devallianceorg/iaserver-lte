<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiAuthMode;
use App\Http\Controllers\Core\ApiConsume;

class ApiPermisos extends Controller
{
    public $authMode;
    public function __construct(ApiAuthMode $authMode)
    {
        $this->authMode= $authMode;
    }

    public function getAll($params=[]) {
        $api = new ApiConsume();
        $api->setHost(env('IASERVER_AUTH'));
        $api->setAuth($this->authMode);

        $api->get("acl/permission",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }

    public function add($name) {
        $api = new ApiConsume();
        $api->setHost(env('IASERVER_AUTH'));
        $api->setAuth($this->authMode);

        $params['name'] = $name;

        $api->post("acl/permission",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }

    public function del($id) {
        $api = new ApiConsume();
        $api->setHost(env('IASERVER_AUTH'));
        $api->setAuth($this->authMode);

        $params['id'] = $id;

        $api->delete("acl/permission",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }
}