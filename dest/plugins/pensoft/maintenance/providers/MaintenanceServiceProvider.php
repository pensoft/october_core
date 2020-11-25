<?php

declare(strict_types=1);

namespace Pensoft\Maintenance\Providers;

use Illuminate\Foundation\Application;
// use Illuminate\Support\ServiceProvider;
use Cms\ServiceProvider;
use Pensoft\Maintenance\Contracts\ResponseMaker;
use Pensoft\Maintenance\Classes\MaintenanceResponder;
// use Vdlp\Maintenance\Contracts\ResponseMaker;

final class MaintenanceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ResponseMaker::class, MaintenanceResponder::class);

        $this->registerMaintenanceHandler();
    }

    protected function registerMaintenanceHandler(): void
    {
        $this->app->booting(static function (Application $app) {
            $responder = $app->make(ResponseMaker::class);
            if($responder->isDownForMaintenance()){
                $responder->getResponse()->send();
                exit;
            }
        });
    }
}
