<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Symfony\Component\Finder\Finder;

class CustomRouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
    	$this->customWebRoutes();
        $this->mapApiRoutes();
        //$this->mapApiJwtRoutes();
    }

    protected function mapApiRoutes()
    {
        $files = Finder::create()
            ->in(app_path('Http/Controllers'))
            ->name('api_routes.php');

        foreach($files as $file) {
            $prefix = strtolower($file->getRelativePath());
            $relativeToNamespace = str_replace('/','\\',$file->getRelativePath());
            $autoNamespace = "{$this->namespace}\\{$relativeToNamespace}";

            Route::prefix($prefix)
                ->middleware(['api'])
                ->namespace($autoNamespace)
                ->group($file->getRealPath());
        }
    }

    protected function mapApiJwtRoutes()
    {
        $files = Finder::create()
            ->in(app_path('Http/Controllers/Api'))
            ->name('jwt.php');

        foreach($files as $file) {
            Route::prefix('api/jwt')
                ->middleware(['api','jwt'])
                ->namespace($this->namespace)
                ->group($file->getRealPath());
        }
    }

    /**
     * Define the "custom" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function customWebRoutes()
    {
        $files = Finder::create()
            ->in(app_path('Http/Controllers'))
            ->name('routes.php');

        foreach($files as $file) {
            $prefix = strtolower($file->getRelativePath());
            $relativeToNamespace = str_replace('/','\\',$file->getRelativePath());
            $autoNamespace = "{$this->namespace}\\{$relativeToNamespace}";

            if(empty($prefix)) {
                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->group($file->getRealPath());
            } else {
                Route::prefix($prefix)
                    ->middleware('web')
                    ->namespace($autoNamespace)
                    ->group($file->getRealPath());
            }
        }
    }
}
