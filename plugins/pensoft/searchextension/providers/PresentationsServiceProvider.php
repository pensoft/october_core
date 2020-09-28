<?php

namespace Pensoft\Searchextension\providers;

use OFFLINE\SiteSearch\Classes\Providers\ResultsProvider;
use pensoft\Media\Models\Presentations;

class PresentationsServiceProvider extends ResultsProvider
{
    public function search()
    {
        $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();
        // Get your matching models
        $matching = Presentations::where('name', 'ilike', "%{$this->query}%")->get();

        // Create a new Result for every match
        foreach ($matching as $match) {
            $result            = $this->newResult();

            $result->relevance = 1;
            $result->title     = $match->name;
            $result->text      = $match->content ?: '';
            $result->url       = $controller->pageUrl('presentation');
            // $result->thumb     = $match->presentation_image;
            $result->model     = $match;
            $result->meta      = [];

            // Add the results to the results collection
            $this->addResult($result);
        }

        return $this;
    }
    public function displayName()
    {
        return 'Media/Presentations';
    }

    public function identifier()
    {
        return 'Pensoft.Media.Presentations';
    }
}
