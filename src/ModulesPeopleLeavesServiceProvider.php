<?php


namespace Dorcas\ModulesPeopleLeaves;

use Illuminate\Support\ServiceProvider;

class ModulesPeopleLeavesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'modules-people-leaves');
        $this->publishes([
            __DIR__ . '/public/vendors/Datatable' => public_path('vendors/Datatable'),
        ],'public');
        $this->publishes([
            __DIR__ . '/config/modules-people-leaves.php' => config_path('modules-people-leaves.php'),
        ], 'config');
        // adds models to directory path



    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // add menu config
        $this->mergeConfigFrom(
            __DIR__ . '/config/navigation-menu.php', 'navigation-menu.modules-people.sub-menu'
        );
    }
}