<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Log;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Autoload routes from each module in src/
        $modules = glob(base_path('src/*'), GLOB_ONLYDIR);
        foreach ($modules as $module) {
            $routeFile = $module . '/Routes/web.php';
            if (file_exists($routeFile)) {
                Log::info('Loading route: ' . $routeFile);
                $this->loadRoutesFrom($routeFile);
            }
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}