<?php namespace pensoft\Cardprofiles\Models;

use Model;

/**
 * Model
 */
class Profiles extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_cardprofiles_items';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'category' => [Category::class, 'key' => 'category_id', 'otherKey' => 'id']
    ];

    public $attachOne = [
        'avatar' => 'System\Models\File'
    ];

}
