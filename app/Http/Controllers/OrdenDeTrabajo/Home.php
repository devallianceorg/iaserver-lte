<?php

namespace App\Http\Controllers\OrdenDeTrabajo;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

/**
 * Class Home
 * @package App\Http\Controllers\OrdenDeTrabajo
 * @ignore
 */
class Home extends Controller
{
    public function index()
    {
        return view('trazabilidad.index');
    }
}
