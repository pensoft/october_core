<?php

namespace Pensoft\Searchextension\providers;

use OFFLINE\SiteSearch\Classes\Providers\ResultsProvider;
use pensoft\Media\Models\MediaLogos;

class LogosServiceProvider extends ResultsProvider
{
    public function search()
    {
        $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();
        // Get your matching models
        $matching = MediaLogos::where('name', 'ilike', "%{$this->query}%")->get();

        // Create a new Result for every match
        foreach ($matching as $match) {
            $result            = $this->newResult();

            $result->relevance = 1;
            $result->title     = $match->name;
            $result->text      = $match->content ?: '';
            $result->url       = $controller->pageUrl('logo');
            $result->thumb     = $match->logo_image;
            $result->model     = $match;
            $result->meta      = [];

            // Add the results to the results collection
            $this->addResult($result);
        }

        return $this;
    }
    public function displayName()
    {
        return 'Media/Logos';
    }

    public function identifier()
    {
        return 'Pensoft.Media.Logos';
    }
}
