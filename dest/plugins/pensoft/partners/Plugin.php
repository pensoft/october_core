<?php namespace Pensoft\Partners;

use System\Classes\PluginBase;
use Pensoft\Partners\Components\PartnerList;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            PartnerList::class => 'partners',
        ];
    }

    public function registerSettings()
    {
    }
}
