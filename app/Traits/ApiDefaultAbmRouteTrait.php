<?php
namespace App\Traits;

use App\Http\Controllers\Core\ApiConsume;

/**
 * Class ApiDefaultAbmRouteTrait
 * @package App\Traits
 */
trait ApiDefaultAbmRouteTrait
{
    public $route = '';
    public $errors = [];

    /**
     * Verifica que el consumo de routes no errores como respuesta.
     * @return bool
     */
    public function hasErrors() {
        if(count($this->errors)>0) {
            return true;
        }
        return false;
    }

    /**
     * Lista de errores por consumo de routes
     * @return array
     */
    public function errors() {
        return $this->errors;
    }

    /**
     * Chequea y organiza errores por className.
     * @param ApiConsume $api
     * @param string $fx
     */
    private function checkErrors(ApiConsume $api,$fx) {
        if($api->hasError()) {
            $this->errors[$fx] = $api->getError();
        }
    }

    /**
     * Define la ruta a consumir
     * @param string $route
     */
    public function setAbmRoute($route)
    {
        $this->route = $route;
    }

    /*
     * DEFAULT ABM ROUTES
     */
    /**
     * Obtiene una lista de registros
     * @param array $params
     * @return ApiConsume
     */
    public function getList($params=[])
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->get($this->route,$params);
        $this->checkErrors($api,__FUNCTION__);
        return $api;
    }

    public function show($id,$params)
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->post("{$this->route}/{$id}",$params);
        $this->checkErrors($api,__FUNCTION__);
        return $api;
    }

    public function create($params)
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->post("{$this->route}/create",$params);
        $this->checkErrors($api,__FUNCTION__);
        return $api;
    }

    /**
     * Elimina un registro
     * @param int $id
     * @return ApiConsume
     */
    public function delete($id)
    {
        // Consume API
        $uri = 'iaserver-api';
        $api = new ApiConsume($uri);
        $api->post("{$this->route}/delete/{$id}");
        $this->checkErrors($api,__FUNCTION__);
        return $api;
    }
}