<?php namespace Pensoft\Articles\Components;

use Cms\Classes\ComponentBase;
use Pensoft\Articles\Models\Article;

class PublicationsList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'PublicationsList Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

	public function getReadmoreLink($item)
	{
		return '<a href="/news/' . $item->slug . '" ><b>...read more</b></a>';
	}

	public function getUrl($item)
	{
		return '/news/' . $item->slug;
	}

	public function getPublications()
	{
		if ($this->property('maxItems') > 0) {
			return Article::orderBy('published_at', 'desc')->where('type', 2)->take($this->property('maxItems'))->get();
		}
		return Article::orderBy('published_at', 'desc')->where('type', 2)->get();
	}
}
