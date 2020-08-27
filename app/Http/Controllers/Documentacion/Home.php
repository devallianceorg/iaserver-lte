<?php

namespace App\Http\Controllers\Documentacion;

use App\Http\Controllers\Controller;

/**
 * Class Home
 * @package App\Http\Controllers
 * @ignore
 */
class Home extends Controller
{
    public function index()
    {
        $api = new Docs();
        $structure = $api->readStructureXml();
        
        return view('docs',$structure);
    }
}
