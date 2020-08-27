<?php

namespace App\Http\Controllers\Documentacion;

use App\Http\Controllers\Controller;

/**
 * Class DocTag
 * @package App\Http\Controllers\Documentacion
 * @ignore
 */
class DocTag extends Controller
{
    public $name;
    public $description;
    public $type;
    public $variable;

    public function __construct($tag)
    {
        if(isset($tag['@attributes']['name'])) {
            $this->name = $tag['@attributes']['name'];
        }
        if(isset($tag['@attributes']['description'])) {
            $this->description = $tag['@attributes']['description'];
        }
        if(isset($tag['@attributes']['variable'])) {
            $this->variable= $tag['@attributes']['variable'];
        }
        if(isset($tag['type'])) {
            $this->type= $tag['type'];
        }

        return $this;
    }
}
