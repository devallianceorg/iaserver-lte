<?php

namespace App\Http\Controllers\Documentacion;

use App\Http\Controllers\Controller;

/**
 * Class Docs
 * @package App\Http\Controllers\Documentacion
 * @ignore
 */
class Docs extends Controller
{    
    public function readStructureXml()
    {
        $xml = new \SimpleXMLElement("../docs/files/structure.xml", null, true);
        $namespaces = [];

        foreach ($xml->file as $file)
        {
            $docElement = new DocElement($file);
            if($docElement->namespace) {
                $namespaces[$docElement->namespace][] = $docElement;
            }
        }

        ksort($namespaces);

        return compact('namespaces');
    }
}
