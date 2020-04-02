<?php

namespace App\Http\Controllers\ControldeStencil;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class Home extends Controller
{
    public function index()
    {
        return view('controldestencil.index');
    }
}
