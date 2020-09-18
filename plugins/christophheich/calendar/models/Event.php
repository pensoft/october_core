<?php namespace ChristophHeich\Calendar\Models;

use Model;

/**
 * Model
 */
class Event extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

	/* translate */
	public $implement = ['RainLab.Translate.Behaviors.TranslatableModel'];

	public $translatable = ['title', 'description'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'christophheich_calendar_events';
}
