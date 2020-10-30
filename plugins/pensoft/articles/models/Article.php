<?php namespace Pensoft\Articles\Models;

use Carbon\Carbon;
use Model;
use October\Rain\Database\Relations\AttachOne;

/**
 * Model
 */
class Article extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_articles_article';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];

    public function getPrettyAllowShareAttribute(){
        return filter_var($this->allow_share, FILTER_VALIDATE_BOOLEAN) ? "yes" : "no";
    }

    public function getReadmoreAttribute($value){
        return '<a href="'. $this->slug .'" >...read more</a>'. $value;
    }

    public function getPublishedatAttribute($value) {
        $date = new Carbon($value);
        return $date->day .' '. $date->englishMonth . ' ' . $date->year;
    }
}
