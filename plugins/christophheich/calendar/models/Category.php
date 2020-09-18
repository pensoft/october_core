<?php namespace ChristophHeich\Calendar\Models;

use Model;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'christophheich_calendar_categories';



    /* translate */
	public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

	public $translatable = ['title', 'description'];
}
