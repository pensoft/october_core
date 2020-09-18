<?php namespace Pensoft\Links\Models;

use Model;


/**
 * Model
 */
class Link extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_links_link';

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];

    public $belongsTo = [
        'category' => [Category::class, 'key' => 'category_id', 'otherKey' => 'id']
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
