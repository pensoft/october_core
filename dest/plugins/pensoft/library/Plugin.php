<?php namespace Pensoft\Library;


use System\Classes\PluginBase;
use Pensoft\Library\Components\Library;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            Library::class => 'library',
        ];
    }

    public function registerSettings()
    {
    }
}
