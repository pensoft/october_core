<?php namespace Christophheich\Calendar\Components;

use Cms\Classes\ComponentBase;
use ChristophHeich\Calendar\Models\Entry;
use Illuminate\Support\Facades\Session;

class PastEvents extends ComponentBase
{
    public function init()
    {
        $this->page['default_year'] = \Lang::get('christophheich.calendar::lang.entry.year');
        $this->page['result'] = $this->getCurrentPastEntries();
    }
    public function componentDetails()
    {
        return [
            'name'        => 'PastEvents',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function getEntryEndYears(){
        return Entry::getEntryEndYears();
    }

    public function getCurrentPastEntries(){
        return Entry::getPastEntries('year', date('Y'));
        
    }

    public function onTest()
    {
        $year = input('year', date('Y'));
        $entries = Entry::getPastEntries('year', $year);
        $this->page['result'] = $entries;
    }
}
