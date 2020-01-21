<?php

namespace App\Http\Controllers\Npmpicker\Api\v1;

use App\Http\Controllers\Controller;

class PingRest extends Controller
{
    public function index()
    {
	return 'Ping::v1::index';
    }

    public function show($id)
    {
	return "Ping::v1::show::$id";
    }
}
