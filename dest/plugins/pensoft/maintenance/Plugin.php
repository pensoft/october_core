<?php

namespace Pensoft\Maintenance;

use System\Classes\PluginBase;
use Pensoft\Maintenance\Providers\MaintenanceServiceProvider;

class Plugin extends PluginBase
{

    public function boot(){
        \Cms\Classes\CmsController::extend(function ($controller) {
            // $controller->middleware(\Pensoft\Maintenance\classes\CheckForMaintenanceMode::class, [1]);
        });
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function register(){
        // $this->app->register(MaintenanceServiceProvider::class);
    }
}
