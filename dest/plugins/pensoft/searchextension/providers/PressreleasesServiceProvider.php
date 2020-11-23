<?php

namespace Pensoft\Searchextension\providers;

use OFFLINE\SiteSearch\Classes\Providers\ResultsProvider;
use pensoft\Media\Models\Pressreleases;

class PressreleasesServiceProvider extends ResultsProvider
{
    public function search()
    {
        $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();
        // Get your matching models
        $matching = Pressreleases::where('name', 'ilike', "%{$this->query}%")
            ->orWhere('description', 'ilike', "%{$this->query}%")
            ->get();

        // Create a new Result for every match
        foreach ($matching as $match) {
            $result            = $this->newResult();

            $result->relevance = 1;
            $result->title     = $match->name;
            $result->text      = $match->description ?: '';
            $result->url       = $match->link ?: $controller->pageUrl('press-releases');
            // $result->thumb     = null;
            $result->model     = $match;
            $result->meta      = [
                'target' => '_blank'
            ];
            if(!$match->link){
                unset($result->meta['target']);
            }


            // Add the results to the results collection
            $this->addResult($result);
        }

        return $this;
    }
    public function displayName()
    {
        return 'Media/Pressreleases';
    }

    public function identifier()
    {
        return 'Pensoft.Media.Pressreleases';
    }
}
