<?php

namespace Pensoft\Searchextension\providers;

use OFFLINE\SiteSearch\Classes\Providers\ResultsProvider;
use Pensoft\Links\Models\Link;

class LinksServiceProvider extends ResultsProvider
{
    public function search()
    {
        $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();
        // Get your matching models
        $matching = Link::where('title', 'ilike', "%{$this->query}%")
            ->orWhere('content', 'ilike', "%{$this->query}%")
            ->get();

        // Create a new Result for every match
        foreach ($matching as $match) {
            $result            = $this->newResult();

            $result->relevance = 1;
            $result->title     = $match->title;
            $result->text      = $match->content;
            $result->url       = $match->url;
            $result->thumb     = $match->cover;
            $result->model     = $match;
            $result->meta      = [
                'target' => '_blank',
            ];

            // Add the results to the results collection
            $this->addResult($result);
        }

        return $this;
    }
    public function displayName()
    {
        return 'Links';
    }

    public function identifier()
    {
        return 'Pensoft.Links';
    }
}
