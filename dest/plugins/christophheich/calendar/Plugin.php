<?php namespace ChristophHeich\Calendar;
/**
 * Created by PhpStorm.
 * User: Christoph Heich
 * Date: 02.06.2018
 * Time: 15:12
 */

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'ChristophHeich\Calendar\Components\Calendar' => 'calendar',
            'ChristophHeich\Calendar\Components\PastEvents' => 'PastEvents',
            'ChristophHeich\Calendar\Components\Timeline' => 'Timeline',
        ];
    }

    public function registerSettings()
    {

    }
}
