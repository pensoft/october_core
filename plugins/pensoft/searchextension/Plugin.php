<?php

namespace Pensoft\Searchextension;

use Illuminate\Support\Facades\Event;
use Pensoft\Searchextension\providers\EventsServiceProvider;
use Pensoft\Searchextension\providers\FlyersServiceProvider;
use Pensoft\Searchextension\providers\LinksServiceProvider;
use Pensoft\Searchextension\providers\LogosServiceProvider;
use Pensoft\Searchextension\providers\NewslettersServiceProvider;
use Pensoft\Searchextension\providers\NewsServiceProvider;
use Pensoft\Searchextension\providers\PartnersServiceProvider;
use Pensoft\Searchextension\providers\PresentationsServiceProvider;
use Pensoft\Searchextension\providers\PressreleasesServiceProvider;
use Pensoft\Searchextension\providers\VideosServiceProvider;
use Pensoft\Searchextension\providers\LibraryServiceProvider;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot(){
        Event::listen('offline.sitesearch.extend', function () {
            return [
                new NewsServiceProvider(), 
                new LinksServiceProvider(), 
                new EventsServiceProvider(), 
                new PartnersServiceProvider(),
                new FlyersServiceProvider(),
                new LogosServiceProvider(),
                new NewslettersServiceProvider(),
                new PresentationsServiceProvider(),
                new PressreleasesServiceProvider(),
                new VideosServiceProvider(),
                new LibraryServiceProvider(),
            ];
        });
    }
}
