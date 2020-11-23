<?php namespace Pensoft\Links;

use System\Classes\PluginBase;
use Pensoft\Links\Components\Items;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            Items::class => 'items',
        ];
    }

    public function registerSettings()
    {
    }
}
