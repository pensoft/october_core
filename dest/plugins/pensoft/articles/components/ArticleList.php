<?php

namespace Pensoft\Articles\Components;

use \Cms\Classes\ComponentBase;
use Pensoft\Articles\Models\Article;

class ArticleList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'List',
            'description' => 'Displays a collection of articles.'
        ];
    }

    public function defineProperties()
    {
        return [
            'maxItems' => [
                'title' => 'Max items',
                'description' => 'Max items allowed',
                'default' => 10,
            ]
        ];
    }

    public function getReadmoreLink($item, $page_id)
    {
        return '<a href="/' .$page_id. '/' . $item->slug . '" ><b>...read more</b></a>';
    }

    public function getUrl($item, $page_id)
    {
        return $this->pageUrl($page_id, ['id' => $item->slug]);
    }


    public function getArticles()
    {
        if ($this->property('maxItems') > 0) {
            return Article::orderBy('published_at', 'desc')->where('type', 1)->take($this->property('maxItems'))->get();
        }
        return Article::get();
    }
}
