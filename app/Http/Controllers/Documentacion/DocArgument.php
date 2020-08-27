<?php

namespace App\Http\Controllers\Documentacion;

use App\Http\Controllers\Controller;

/**
 * Class DocArgument
 * @package App\Http\Controllers\Documentacion
 * @ignore
 */
class DocArgument extends Controller
{
    public $name;
    public $type;
    public $default;

    public function __construct($arg)
    {
        if(isset($arg['name'])) {
            $this->name = $arg['name'];
        }
        if(isset($arg['type'])) {
            $this->type= $arg['type'];
            if(empty($this->type)) {
                $this->type = 'undefined';
            }
        }
        if(isset($arg['default'])) {
            $this->default= $arg['default'];
        }

        return $this;
    }
}
