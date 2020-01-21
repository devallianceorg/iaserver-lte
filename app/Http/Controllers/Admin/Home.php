<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class Home extends Controller
{
    public function index()
    {
	    return 'Admin::home::index';
    }

    public function logout()
    {
	    return "Admin::home::logout";
    }
}
