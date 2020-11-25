<?php

namespace Pensoft\Searchextension\providers;

use OFFLINE\SiteSearch\Classes\Providers\ResultsProvider;
use pensoft\Media\Models\Videos;

class VideosServiceProvider extends ResultsProvider
{
    public function search()
    {
        $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();
        // Get your matching models
        $matching = Videos::where('name', 'ilike', "%{$this->query}%")
            ->get();

        // Create a new Result for every match
        foreach ($matching as $match) {
            $result            = $this->newResult();

            $result->relevance = 1;
            $result->title     = $match->name;
            $result->text      = $match->description ?: '';
            $result->url       = $controller->pageUrl('videos');
            // $result->thumb     = null;
            $result->model     = $match;
            $result->meta      = [
                'target' => '_blank'
            ];
           
            if($match->youtube_url){
                $result->url = $match->youtube_url;
            }else if ($match->vimeo_url) {
                $result->url = $match->vimeo_url;
            }else{
                unset($result->meta['target']);
            }

            // Add the results to the results collection
            $this->addResult($result);
        }

        return $this;
    }
    
    public function displayName()
    {
        return 'Media/Videos';
    }

    public function identifier()
    {
        return 'Pensoft.Media.Videos';
    }
}
