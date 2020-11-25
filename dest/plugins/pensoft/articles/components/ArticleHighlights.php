<?php

namespace Pensoft\Articles\Components;

use \Cms\Classes\ComponentBase;
use Pensoft\Articles\Models\Article;

class ArticleHighlights extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Article Hightlights',
            'description' => ''
        ];
    }

    public function defineProperties()
    {
        return [
            'maxItems' => [
                'title' => 'Max items',
                'description' => 'Max items allowed',
                'default' => 10,
            ],
            'title' => [
                'title' => 'Head title',
                'description' => '',
                'default' => false
            ]
        ];
    }

    public function getTitle(){
        if(!$this->property('title')){
            return false;
        }
        return $this->property('title');
    }

    public function getHighlights(){
        if (!$this->property('maxItems')) {
            return;
        }
        return Article::orderBy('published_at', 'desc')->where('type', 1)->take($this->property('maxItems'))->get()->map(function($item){
            $item->content = str_limit(strip_tags($item->content), 100);
            $item->href = '/news/'. $item->slug;
            return $item;
        });
    }

    public function isEmpty(){
        return !Article::count();
    }

    // public function getReadmoreLink($item, $page_id)
    // {
    //     return '<a href="/' . $page_id . '/' . $item->slug . '" ><b>...read more</b></a>';
    // }

    // public function getUrl($item, $page_id)
    // {
    //     return $this->pageUrl($page_id, ['id' => $item->slug]);
    // }


    // public function getArticles()
    // {
    //     if ($this->property('maxItems') > 0) {
    //         return Article::orderBy('published_at', 'desc')->take($this->property('maxItems'))->get();
    //     }
    //     return Article::get();
    // }
}
