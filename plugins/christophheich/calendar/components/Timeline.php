<?php

namespace ChristophHeich\Calendar\Components;

/**
 * Created by PhpStorm.
 * User: Christoph Heich
 * Date: 02.06.2018
 * Time: 17:36
 */

use ChristophHeich\Calendar\Models\Entry;
use Cms\Classes\ComponentBase;

class Timeline extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Timeline',
            'description' => 'Displays a timeline events.'
        ];
    }

    public function defineProperties()
    {
        return [
            'limit' => [
                'title'             => 'Limit',
                'description'       => 'You can limit the amount of events shown. While "null" equals to no limit and "30" says that the latest 30 events will be shown.',
                'default'           => '5',
                'type'              => 'string',
                'validationPattern' => '^[1-9]+$',
                'validationMessage' => 'You can only use numeric symbols eg. 5 or 1.'
            ],
        ];
    }

    public function getLatestEntries()
    {
        $entries = Entry::orderBy('created_at', 'desc');
        return $entries->take($this->property('limit'))->get();
    }
}
