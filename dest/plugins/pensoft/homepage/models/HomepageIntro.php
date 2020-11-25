<?php namespace Pensoft\Homepage\Models;

use Model;

/**
 * Model
 */
class HomepageIntro extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_homepage_intro';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

	public $attachOne = [
		'image' => 'System\Models\File',
		'mobile_image' => 'System\Models\File'
	];
}
