<?php namespace Pensoft\InternalDocuments\Models;

use Model;

/**
 * Model
 */
class Subfolders extends Model
{
    use \October\Rain\Database\Traits\Validation;
	use \October\Rain\Database\Traits\NestedTree; // Nested Tree



    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_internaldocuments_subfolders';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

	protected $jsonable = ['files_groups'];

	protected $nullable = ['parent_id'];

    public $belongsTo = [
		'parent' => 'Pensoft\Internaldocuments\Models\Subfolders'
	];

	public $attachMany = [
		'files' => ['System\Models\File', 'order' => 'sort_order'],
		'images' => ['System\Models\File', 'order' => 'sort_order'],
		];

	public $attachOne = [
		'cover' => 'System\Models\File'
	];
}
