<?php namespace Pensoft\Content\Models;

use Model;

/**
 * Model
 */
class Rubrics extends Model
{
    use \October\Rain\Database\Traits\Validation;
	use \October\Rain\Database\Traits\Sortable;
    
    /**
	 * @var string The database table used by the model.
     */
	public $table = 'pensoft_content_rubrics';
	
    /**
	 * @var array Validation rules
     */
	public $rules = [
		'name' => 'required',
		'slug' => 'required',
    ];
	

	//    Relations



	public $belongsTo = [
		'page' => 'Pensoft\Content\Models\Pages',
	];


	public $attachOne = [
		'cover_icon' => 'System\Models\File',
	];

	public $implement = [
		'RainLab.Translate.Behaviors.TranslatableModel',
	];

	public $translatable = [['name', 'index' => true],  ['description', 'index' => true]];

	public function getNamePageAttribute()
	{
		if (isset($this->page['title'])) {
			return $this->name . " (" . $this->page['title'] . ")";
		} else {
			return $this->name;
		}
	}

}
