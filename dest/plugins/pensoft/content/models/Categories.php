<?php namespace Pensoft\Content\Models;

use Model;

/**
 * Model
 */
class Categories extends Model
{
    use \October\Rain\Database\Traits\Validation;
	use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_content_categories';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

	public $implement = [
		'RainLab.Translate.Behaviors.TranslatableModel',
	];

	public $translatable = ['name', 'description'];
}
