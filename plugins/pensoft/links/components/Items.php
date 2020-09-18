<?php

namespace Pensoft\Links\Components;

use \Cms\Classes\ComponentBase;
use Pensoft\Links\Models\Category;
use Pensoft\Links\Models\Link;
class Items extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'          => 'items',
            'description'   => ''
        ];
    }

    public function defineProperties()
    {
        return [
            'show-category-title' => [
                'title' => 'Show title',
                'type' => 'checkbox',
                'default' => false,
            ],
            'category' => [
                'title' => 'Select category',
                'required' => true,
                'type' => 'dropdown',
                'description' => 'Select category',
            ],
            'maxItems' => [
                'title' => 'Max items',
                'description' => 'Max items allowed',
                'default' => 0,
            ]
        ];
    }

    public function getCategoryOptions()
    {
        return Category::all()->lists('title', 'id');
    }

    public function getCategoryTitle(){
        if($this->property('category') && $this->property('show-category-title')){
            return Category::find($this->property('category'))->title;
        }
        return;
    }

    public function getLinks()
    {
        $links = new Link;
        if ($this->property('maxItems') > 0) {
            $links = $links->take($this->property('maxItems'));
        }
        if($this->property('category')){
            $links = $links->where('category_id', $this->property('category'));
        }
        return $links->orderBy('created_at', 'desc')->get();
    }
}
