<?php

namespace Pensoft\Searchextension\providers;

use OFFLINE\SiteSearch\Classes\Providers\ResultsProvider;
use Pensoft\Library\Models\Library;

class LibraryServiceProvider extends ResultsProvider
{
    public function search()
    {
        $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();
        // Get your matching models
        $matching = Library::where('title', 'ilike', "%{$this->query}%")->get();

        // Create a new Result for every match
        foreach ($matching as $match) {
            $result            = $this->newResult();

            $result->relevance = 1;
            $result->title     = $match->title;
            $result->text      = $match->content ?: '';
            $result->url       = $controller->pageUrl('library');
            // $result->thumb     = $match->newsletter_image;
            $result->model     = $match;
            $result->meta      = [];

            // Add the results to the results collection
            $this->addResult($result);
        }

        return $this;
    }
    public function displayName()
    {
        return 'Library';
    }

    public function identifier()
    {
        return 'Pensoft.Library';
    }
}
