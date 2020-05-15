<?php
namespace App\Traits;

use App\Http\Controllers\Core\ApiConsume;

trait ApiConsumeHandleTrait {

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

}