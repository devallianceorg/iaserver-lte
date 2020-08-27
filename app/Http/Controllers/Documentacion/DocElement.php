<?php

namespace App\Http\Controllers\Documentacion;

use App\Http\Controllers\Controller;

/**
 * Class DocElement
 * @package App\Http\Controllers\Documentacion
 * @ignore
 */
class DocElement extends Controller
{
    public $render = false;
    public $namespace;
    public $className;
    public $full_name;

    public $description;
    public $long_description;
    public $params = [];
    public $tags = [];
    public $methods = [];

    public $group;

    private $file;
    private $class;

    public function __construct($file)
    {
        $this->file= $file;

        // Convierte en array el contenido
        $json = json_encode($this->file->class);
        $this->class = json_decode($json, true);
        if($this->class) {
            $this->setNamespace();
            $this->setClassName();
            $this->setFullName();
            $this->setMethods();
            $this->setDockblock();
        }
    }

    private function setNamespace() {
        if (isset($this->class['@attributes']['namespace'])) {
            $namespace = $this->class['@attributes']['namespace'];
            $this->namespace = str_replace('App\\Http\\Controllers\\','',$namespace);
        }
    }
    private function setClassName() {
        if(isset($this->class['name'])) {
            $this->className = $this->class['name'];
        }
    }
    private function setFullName() {
        if(isset($this->class['full_name'])) {
            $this->full_name = $this->class['full_name'];
        }
    }
    private function setMethods()
    {
        if(isset($this->class['method'])) {
            $methods = $this->class['method'];
            if(is_array($methods)) {
                foreach($methods as $item) {
                    $this->methods[] = new DocMethod($item);
                }
            } else {
                $this->methods = [new DocMethod($methods)];
            }
        }
    }
    private function setDockblock() {

        if(isset($this->class['docblock']['description'])) {
            $this->description = $this->class['docblock']['description'];
        }
        if(isset($this->class['docblock']['long-description'])) {
            $this->long_description= $this->class['docblock']['long-description'];
        }

        if(isset($this->class['docblock']['tag'])) {
            foreach($this->class['docblock']['tag'] as $tag) {
                $this->tags[] = new DocTag($tag);
            }
        }

        $tags = collect($this->tags);
        $this->group= $tags->where('name','group');
    }
}
