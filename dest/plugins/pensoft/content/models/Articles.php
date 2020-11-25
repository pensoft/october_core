<?php namespace Pensoft\Content\Models;

use Model;

/**
 * Model
 */
class Articles extends Model
{
    use \October\Rain\Database\Traits\Validation;
	use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_content_articles';

    /**
     * @var array Validation rules
     */
    public $rules = [
		'title' => 'required',
		'slug' => 'required',
    ];


//    Relations

	public $attachOne = [
		'cover_image' => 'System\Models\File',
	];

	public $implement = [
		'RainLab.Translate.Behaviors.TranslatableModel',
	];

	public $translatable = [['title', 'index' => true],  ['description', 'index' => true]];
}
