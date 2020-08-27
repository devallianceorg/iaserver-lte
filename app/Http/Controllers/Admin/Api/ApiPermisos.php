<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiAuthMode;
use App\Http\Controllers\Core\ApiConsume;

/**
 * Gestion de permisos mediante ApiConsume
 * @group Controller
 */
class ApiPermisos extends Controller
{
    public $authMode;

    /**
     * Tipo de autenticacion para consumo de API
     * @param ApiAuthMode $authMode
     */
    public function __construct(ApiAuthMode $authMode)
    {
        $this->authMode= $authMode;
    }

    /**
     * Lista de permisos
     * @param array $params
     * @return mixed
     */
    public function getAll($params=[]) {
        $api = new ApiConsume();
        $api->setHost(env('IASERVER_AUTH'));
        $api->setAuth($this->authMode);

        $api->get("acl/permission",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }

    /**
     * Crear permiso
     * @param string $name
     * @return mixed
     */
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

    /**
     * Elimina un permiso
     * @param int $id
     * @return mixed
     */
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