<?php

namespace Pensoft\Searchextension\providers;

use OFFLINE\SiteSearch\Classes\Providers\ResultsProvider;
use Pensoft\Articles\Models\Article;

class NewsServiceProvider extends ResultsProvider {
    public function search()
    {
        $controller = \Cms\Classes\Controller::getController() ?? new \Cms\Classes\Controller();
        // Get your matching models
        $matching = Article::where('title', 'ilike', "%{$this->query}%")
        ->orWhere('content', 'ilike', "%{$this->query}%")
        ->get();

        // Create a new Result for every match
        foreach ($matching as $match) {
            $result            = $this->newResult();

            $result->relevance = 1;
            $result->title     = $match->title;
            $result->text      = $match->content;
            $result->url       = $controller->pageUrl('news', ['id' => $match->slug]);
            // $result->thumb     = $match->cover;
            $result->model     = $match;
            // $result->meta      = [
            //     'some_data' => $match->some_other_property,
            // ];

            // Add the results to the results collection
            $this->addResult($result);
        }

        return $this;
    }
    public function displayName()
    {
        return 'News';
    }

    public function identifier()
    {
        return 'Pensoft.Articles';
    }
}
