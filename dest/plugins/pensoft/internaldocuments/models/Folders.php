<?php namespace Pensoft\InternalDocuments\Models;

use Model;

/**
 * Model
 */
class Folders extends Model
{
    use \October\Rain\Database\Traits\Validation;
	use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_internaldocuments_folders';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

	public $attachOne = [
		'cover' => 'System\Models\File'
	];
}
