<?php namespace pensoft\Accordions\Models;

use Model;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_accordions_category';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'items' => Item::class
    ];
}
