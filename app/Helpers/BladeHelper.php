<?php

namespace App\Helpers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ApiLogin;
use Illuminate\Support\Facades\Storage;

class BladeHelper extends Controller
{
    public static function bladeRol($rol) {
        $user = ApiLogin::user();
        $roles = $user['acl']['roles'];

        // Los roles pueden listarse: rol1, rol2, rol3
        $rol = explode(',',str_replace(' ','',$rol));

        $access = collect($roles)->intersect($rol)->isNotEmpty();

        return $access;
    }

    public static function bladePermiso($permiso) {
        $user = ApiLogin::user();
        $permisos = $user['acl']['permisos'];
        $access = collect($permisos)->contains($permiso);
        return $access;
    }

    public static function bladeUser() {
        if(ApiLogin::user() === null) {
            return false;
        } else {
            return true;
        }
    }

    public static function bladeGitBuild() {
        $master_commit = 'local';
        $dev_commit = 'local';

        if(Storage::disk('public')->exists('master.json'))
        {
            $master = Storage::disk('public')->get('master.json');
            $master  = json_decode($master);
            $master_commit = substr($master->sha,0,7);
        }

        if(Storage::disk('public')->exists('developer.json')) {
            $dev = Storage::disk('public')->get('developer.json');
            $dev = json_decode($dev);
            $dev_commit = substr($dev->sha, 0, 7);
        }

        return "Master: $master_commit -  Developer: $dev_commit";
    }
}