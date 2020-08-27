<?php

namespace App\Http\Controllers\SMTDatabase;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

/**
 * Class Home
 * @package App\Http\Controllers\SMTDatabase
 * @ignore
 */
class Home extends Controller
{
    public function index()
    {
        return view('smtdatabase.index');
    }
}
