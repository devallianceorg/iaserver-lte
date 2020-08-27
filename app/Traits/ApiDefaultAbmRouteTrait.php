<?php
namespace App\Traits;

use App\Http\Controllers\Core\ApiConsume;

trait ApiDefaultAbmRouteTrait
{
    public $route = '';
    public $errors = [];

    public function errors() {
        return $this->errors;
    }
    public function fails() {
        if(count($this->errors)>0) {
            return true;
        }
        return false;
    }
    private function checkErrors(ApiConsume $api,$fx) {
        if($api->hasError()) {
            $this->errors[$fx] = $api->getError();
        }
    }

    public function setAbmRoute($route)
    {
        $this->route = $route;
    }
    /*
     * DEFAULT ABM ROUTES
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