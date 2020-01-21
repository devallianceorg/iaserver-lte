<?php

namespace App\Providers;

use App\Helpers\BladeHelper;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('gitversion', function () {
            return BladeHelper::bladeGitBuild();
        });

        Blade::if('user', function () {
            return BladeHelper::bladeUser();
        });

        Blade::if('rol', function ($rol) {
            return BladeHelper::bladeRol($rol);
        });

        Blade::if('permiso', function ($permiso) {
            return BladeHelper::bladePermiso($permiso);
        });
    }
}
