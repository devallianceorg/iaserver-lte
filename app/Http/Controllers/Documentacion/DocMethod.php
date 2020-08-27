<?php

namespace App\Http\Controllers\Documentacion;

use App\Http\Controllers\Controller;

/**
 * Class DocMethod
 * @package App\Http\Controllers\Documentacion
 * @ignore
 */
class DocMethod extends Controller
{
    public $name;
    public $full_name;
    public $description;
    public $long_description;
    public $params = [];
    public $arguments = [];
    public $tags = [];
    public $method;

    public function __construct($method)
    {
        $this->method = $method;
        $this->fillAttributes();

        return $this;
    }

    public function fillAttributes() {
        if(isset($this->method['name'])) {
            $this->name = $this->method['name'];
        }
        if(isset($this->method['full_name'])) {
            $this->full_name = $this->method['full_name'];
        }
        if(isset($this->method['docblock']['description'])) {
            $this->description = $this->method['docblock']['description'];
        }
        if(isset($this->method['docblock']['long-description'])) {
            $this->long_description= $this->method['docblock']['long-description'];
        }
        if(isset($this->method['docblock']['tag'])) {
            foreach($this->method['docblock']['tag'] as $tag) {
                $this->tags[] = new DocTag($tag);
            }
        }

        if(isset($this->method['argument'])) {
            // Verifica si tiene solo 1 argumento o varios
            if(isset($this->method['argument']['name']))
            {
                $this->arguments[] = new DocArgument($this->method['argument']);
            } else {
                foreach($this->method['argument'] as $arg) {
                    $this->arguments[] = new DocArgument($arg);
                }
            }
        }

        $params = collect($this->tags);
        $this->params = $params->where('name','param');
    }
}
