<?php namespace Pensoft\Content\Models;

use Model;

/**
 * Model
 */
class News extends Model
{
    use \October\Rain\Database\Traits\Validation;
	use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_content_news';

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

	public $belongsTo = [
		'rubric' => 'Pensoft\Content\Models\Rubrics',
		'page' => ['Pensoft\Content\Models\Pages', 'conditions' => 'external_link = \'\' AND type = 1 '],
	];

	public function scopeNotAsignedTo($query)
	{
		return $query->where('id',1);

	}

	public $implement = [
		'RainLab.Translate.Behaviors.TranslatableModel',
	];

	public $translatable = [['title', 'index' => true],  ['description', 'index' => true]];
}
