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

    public static $allowSortingOptions = [
        'title asc' => 'Title (asc)',
        'title desc' => 'Title (desc)',
        'year asc' => 'Year (asc)',
        'year desc' => 'Year (desc)',
        'type asc' => 'Type (asc)',
        'type desc' => 'Type (desc)',
    ];

    public static $allowSortTypesOptions = [
        1 => 'Deliverables',
        2 => 'Relevant Publications',
        3 => 'MAIA Publications',
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
			case 1:
				$query->where('type', (int)self::TYPE_DELIVERABLE);
				break;
			case 2:
				$query->where('type', 1)->where('derived', 0);
				break;
			case 3:
				$query->where('type', 1)->where('derived', 1);
				break;
		}

        if(in_array($sort, array_keys(self::$allowSortingOptions))){
            $parts = explode(' ', $sort);
            list($sortField, $sortDirection) = $parts;
            $query->orderBy($sortField, $sortDirection);
        }
    }
}
