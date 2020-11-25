<?php namespace Pensoft\Content\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Board extends Controller
{
	use \October\Rain\Database\Traits\Sortable;

	public $implement = [        
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ReorderController'
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
	public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
		BackendMenu::setContext('Pensoft.Content', 'main-menu-content-types', 'side-menu-content-type-board');
    }
}
