<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Autoload module configs
        $modules = glob(base_path('src/*'), GLOB_ONLYDIR);
        foreach ($modules as $module) {
            $configPath = $module . '/Config';
            if (is_dir($configPath)) {
                foreach (glob($configPath . '/*.php') as $file) {
                    $name = basename($file, '.php');
                    $this->mergeConfigFrom($file, strtolower(basename($module)) . '.' . $name);
                }
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Autoload module views
        $modules = glob(base_path('src/*'), GLOB_ONLYDIR);
        foreach ($modules as $module) {
            $viewsPath = $module . '/Resources/views';
            if (is_dir($viewsPath)) {
                $this->loadViewsFrom($viewsPath, strtolower(basename($module)));
            }
        }
    }
}
