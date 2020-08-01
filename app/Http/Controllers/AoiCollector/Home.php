<?php

namespace App\Http\Controllers\AoiCollector;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Home extends Controller
{
    public function index()
    {
        return view('aoicollector.prod.index');
    }
}
