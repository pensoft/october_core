<?php namespace Pensoft\Content\Models;

use Model;

/**
 * Model
 */
class Pages extends Model
{
    use \October\Rain\Database\Traits\Validation;
	use \October\Rain\Database\Traits\Sortable;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_content_pages';

    /**
     * @var array Validation rules
     */
    public $rules = [
		'title' => 'required',
		'slug' => 'required',
    ];


//    Relations



	public $belongsTo = [
		'parent' => 'Pensoft\Content\Models\Pages',
	];

	public $implement = [
		'RainLab.Translate.Behaviors.TranslatableModel',
	];

  public $translatable = [['title', 'index' => true],  ['description', 'index' => true]];

  public function getTitleParentAttribute()
  {
    if(isset($this->parent['title'])){
      return $this->title . " (" . $this->parent['title'] . ")";
    }else{
      return $this->title;
    }
  }
}
