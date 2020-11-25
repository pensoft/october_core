<?php namespace Pensoft\Content\Models;

use Model;

/**
 * Model
 */
class Media extends Model
{
    use \October\Rain\Database\Traits\Validation;
	use \October\Rain\Database\Traits\Sortable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_content_media';

    /**
     * @var array Validation rules
     */
    public $rules = [
		'title' => 'required',
		'url' => 'required',
    ];

	public $belongsTo = [
		'rubric' => 'Pensoft\Content\Models\Rubrics',
		'page' => ['Pensoft\Content\Models\Pages', 'conditions' => 'external_link = \'\' AND type = 1 '],
	];

	public $attachOne = [
		'file' => 'System\Models\File',
  ];

  public function getTitlePageRubricAttribute()
  {
    $value = '';
    if (isset($this->page['title'])) {

      $value .= "Page:" . $this->page['title'] . ", ";
    }

    if ($this->rubric['name']) {

      $value .= "Rubric:" . $this->rubric['name'] . ", ";
    }

    if ($value) {
      return $this->title . ' ( ' . trim($value, ", ") . ' )';
    } else {
      return $this->title;
    }
  }
}
