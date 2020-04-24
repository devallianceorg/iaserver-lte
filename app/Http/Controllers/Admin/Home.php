<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Api\ApiPermisos;
use App\Http\Controllers\Admin\Api\ApiRoles;
use App\Http\Controllers\Admin\Api\ApiUsers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiAuthMode;
use App\Http\Controllers\Core\ApiLogin;

class Home extends Controller
{
    public function index()
    {
        // Default mode JWT
        $auth =new ApiAuthMode();

        $reqUsers = new ApiUsers($auth);
        $reqRoles = new ApiRoles($auth);
        $reqPermisos = new ApiPermisos($auth);

        $users = $reqUsers->getAll();
        $roles = $reqRoles->getAll();
        $permisos = $reqPermisos->getAll();

        $output = compact('users','roles','permisos');

	    return  view('admin.index',$output);
    }
}
