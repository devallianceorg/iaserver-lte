<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiAuthMode;
use App\Http\Controllers\Core\ApiConsume;

/**
 * Gestion de Roles mediante ApiConsume
 * @package App\Http\Controllers\Admin\Api
 */
class ApiRoles extends Controller
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
     * Lista de roles
     * @param array $params
     * @return mixed
     */
    public function getAll($params=[]) {
        $api = new ApiConsume();
        $api->setHost(env('IASERVER_AUTH'));
        $api->setAuth($this->authMode);

        $api->get("acl/role",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }

    /**
     * Crear rol
     * @param string $name Nombre del rol
     * @return mixed
     */
    public function add($name) {
        $api = new ApiConsume();
        $api->setHost(env('IASERVER_AUTH'));
        $api->setAuth($this->authMode);

        $params['name'] = $name;

        $api->post("acl/role",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
    }

    /**
     * Eliminar rol
     * @param int $id
     * @return mixed
     */
    public function del($id) {
        $api = new ApiConsume();
        $api->setHost(env('IASERVER_AUTH'));
        $api->setAuth($this->authMode);

        $params['id'] = $id;

        $api->delete("acl/role",$params);
        if($api->hasError()) { return $api->getError(); }
        $response = $api->response();

        return $response;
   }
}