<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiAuthMode;
use App\Http\Controllers\Core\ApiConsume;

/**
 * Gestion de Usuarios mediante ApiConsume
 * @package App\Http\Controllers\Admin\Api
 */
class ApiUsers extends Controller
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
     * Lista de Usuarios
     * @param array $params
     * @return mixed
     */
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

    /**
     * Informacion de un usuario especifico
     * @param int $id
     * @param array $params
     * @return mixed
     */
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