<?php namespace Pensoft\Articles;

use Pensoft\Articles\Components\ArticleHighlights;
use Pensoft\Articles\Components\ArticleList;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            ArticleList::class => 'list',
            ArticleHighlights::class => 'article_highlights',
        ];
    }

    public function registerSettings()
    {
    }
}
