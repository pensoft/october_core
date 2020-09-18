<?php

namespace Pensoft\Partners\Components;

use \Cms\Classes\ComponentBase;
use Pensoft\Partners\Models\Partners;

class PartnerList extends ComponentBase
{
	public function componentDetails()
	{
		return [
			'name' => 'Partner List',
			'description' => 'Displays a collection of partners.'
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

	public function getPartners()
	{
		if($this->property('maxItems') > 0){
			return Partners::take($this->property('maxItems'))->get();
		}
		return Partners::get();
	}
}
