<?php

namespace App\Http\Controllers\Npmpicker;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Npmpicker\Api\v1\Npmpicker;

class Home extends Controller
{
    public function index()
    {
        $linea = 1;
        if(request('linea')) {
            $linea = request('linea');
        }
        
        $api = new Npmpicker();
        $info = $api->GetLinea('2020-01-08',$linea,'M');

        $render = compact('info','linea');

        return view('npmpicker.index',$render);
    }
}
