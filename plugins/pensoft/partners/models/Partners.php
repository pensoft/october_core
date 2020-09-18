<?php namespace Pensoft\Partners\Models;

use Model;

/**
 * Model
 */
class Partners extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_partners_partners';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];


}
