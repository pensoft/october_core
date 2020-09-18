<?php

namespace Pensoft\Searchextension\providers;

use OFFLINE\SiteSearch\Classes\Providers\ResultsProvider;
use ChristophHeich\Calendar\Models\Entry;

class EventsServiceProvider extends ResultsProvider
{
    public function search()
    {
        $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();
        // Get your matching models
        $matching = Entry::where('title', 'ilike', "%{$this->query}%")
            ->orWhere('description', 'ilike', "%{$this->query}%")
            ->orWhere('place', 'ilike', "%{$this->query}%")
            ->get();

        // Create a new Result for every match
        foreach ($matching as $match) {
            $result            = $this->newResult();

            $result->relevance = 1;
            $result->title     = $match->title;
            $result->text      = $match->description;
            $result->url       = $controller->pageUrl('events', ['slug' => $match->slug]);
            $result->thumb     = $match->cover_image;
            $result->model     = $match;
            $result->meta      = [
            ];

            // Add the results to the results collection
            $this->addResult($result);
        }

        return $this;
    }
    public function displayName()
    {
        return 'Events';
    }

    public function identifier()
    {
        return 'Pensoft.Events';
    }
}
