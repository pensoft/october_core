<?php namespace pensoft\Cardprofiles\Models;

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
    public $table = 'pensoft_cardprofiles_category';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'profiles' => Profiles::class
    ];
}
