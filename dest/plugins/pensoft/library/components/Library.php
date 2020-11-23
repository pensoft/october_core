<?php

namespace Pensoft\Library\Components;

use \Cms\Classes\ComponentBase;
use Pensoft\Library\Models\Library as LibraryModel;

class Library extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name' => 'Library Records',
            'description' => 'Displays a collection of libraries.'
        ];
    }

    public function defineProperties()
    {
        return [
           
        ];
    }

    public function records()
    {
        return LibraryModel::isVisible()->get();
    }
}
