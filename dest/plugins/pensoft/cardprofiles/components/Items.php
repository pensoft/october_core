<?php

namespace pensoft\Cardprofiles\Components;

use \Cms\Classes\ComponentBase;
use pensoft\Cardprofiles\Models\Category;
class Items extends ComponentBase
{

    // $this->property();

    public function componentDetails()
    {
        return [
            'name'          => 'Profile records',
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
                'default' => 10,
            ]
        ];
    }

    public function getCategoryOptions()
    {
        return Category::all()->lists('name', 'id');
    }

    public function getCategory()
    {
        return Category::find($this->property('category'));
    }
}
