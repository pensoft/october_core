<?php namespace pensoft\Accordions\Models;

use Model;

/**
 * Model
 */
class Item extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_accordions_item';

    public $belongsTo = [
        'accordion' => [Category::class, 'key' => 'category_id', 'otherKey' => 'id']
    ];
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
