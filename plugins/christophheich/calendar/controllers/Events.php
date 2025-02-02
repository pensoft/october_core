<?php namespace ChristophHeich\Calendar\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Events extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'christophheich.calendar.manage_events' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('ChristophHeich.Calendar', 'calendar', 'events');
    }
}
