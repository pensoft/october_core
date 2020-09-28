<?php namespace Pensoft\Library\Models;

use Carbon\Carbon;
use Model;
use Rych\ByteSize\ByteSize;

/**
 * Model
 */
class Library extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    const STATUS_PUBLISHED = 1;
    const STATUS_INPRESS = 2;
    const STATUS_INPREPARATION = 3;
    const STATUS_OTHER = 4;

    const DERIVED_YES = 1;
    const DERIVED_NO = 2;

    const TYPE_JOURNAL_PAPER = 1;
    const TYPE_PROCEEDINGS_PAPER = 2;
    const TYPE_BOOK_CHAPTER = 3;
    const TYPE_BOOK = 4;
    const TYPE_DELIVERABLE = 5;
    const TYPE_REPORT = 6;

	const SORT_TYPE_DELIVERABLES = 1;
	const SORT_TYPE_RELEVANT_PUBLICATIONS = 2;
	const SORT_TYPE_PROJECT_PUBLICATIONS = 3;

    public static $allowSortingOptions = [
        'title asc' => 'Title (asc)',
        'title desc' => 'Title (desc)',
        'year asc' => 'Year (asc)',
        'year desc' => 'Year (desc)',
        'type asc' => 'Type (asc)',
        'type desc' => 'Type (desc)',
    ];

    public static $allowSortTypesOptions = [
		self::SORT_TYPE_DELIVERABLES => 'Deliverables',
		self::SORT_TYPE_RELEVANT_PUBLICATIONS => 'Relevant Publications',
		self::SORT_TYPE_PROJECT_PUBLICATIONS => 'MAIA Publications',
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_library_records';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachOne = [
        'file' => 'System\Models\File'
    ];

    public function getDueDateAttribute($value)
    {
        return (new Carbon($value))->englishMonth;
    }

    public function getYearAttribute($value)
    {
        return (new Carbon($value))->year;
    }

    public function getStatusAttribute($value)
    {
        switch((int) $value){
            case self::STATUS_PUBLISHED: return 'Published';
            case self::STATUS_INPRESS: return 'In Press';
            case self::STATUS_INPREPARATION: return 'In Preparation';
            case self::STATUS_OTHER: return 'Other';
        }
    }

    public function getFileSizeAttribute()
    {
        return (new ByteSize())->format($this->file->file_size);
    }

    public function getDerivedAttribute($value)
    {
        switch((int) $value){
            case self::DERIVED_YES: return 'Yes';
            case self::DERIVED_NO: return 'No';
        }
    }

    public function getIsFileAttribute()
    {
        return isset($this->file);
    }

    public function scopeIsFile($query)
    {
        $query->has('file');
    }

    public function scopeIsVisible($query)
    {
        $query->where('is_visible', true);
    }

    public function scopeListFrontEnd($query, $options = []){
        extract(
            array_merge([
                'sort' => 'created_at desc',
                'type' => 0,
            ], $options)
        );

        switch ($type){
			case self::SORT_TYPE_DELIVERABLES:
				$query->where('type', (int)self::TYPE_DELIVERABLE);
				break;
			case self::SORT_TYPE_RELEVANT_PUBLICATIONS:
				$query->where('type', 1)->where('derived', self::DERIVED_NO);
				break;
			case self::SORT_TYPE_PROJECT_PUBLICATIONS:
				$query->where('type', 1)->where('derived', self::DERIVED_YES);
				break;
		}

        if(in_array($sort, array_keys(self::$allowSortingOptions))){
            $parts = explode(' ', $sort);
            list($sortField, $sortDirection) = $parts;
            $query->orderBy($sortField, $sortDirection);
        }
    }
}
