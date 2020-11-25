<?php namespace Pensoft\Content\Models;

use Model;

/**
 * Model
 */
class Board extends Model
{
    use \October\Rain\Database\Traits\Validation;
	use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_content_board';

    /**
     * @var array Validation rules
     */
    public $rules = [
    	'full_name' => 'required',
    	'email' => 'email'
    ];


//    Relations


	public $attachOne = [
		'picture' => 'System\Models\File'
	];

	public $belongsTo = [
		'rubric' => 'Pensoft\Content\Models\Rubrics',
	];

	public $implement = [
		'RainLab.Translate.Behaviors.TranslatableModel',
	];

	public $translatable = [['full_name', 'index' => true],  ['position', 'index' => true],  ['short_description', 'index' => true]];

	public function getFullNamePositionAttribute()
	{
		return $this->full_name . " (" . $this->positoin_type. ")";
	}
}
