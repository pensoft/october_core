<?php namespace Zakir\ImageCropper\Models;

use ABWebDevelopers\ImageResize\Classes\Resizer;
use Model;
use System\Classes\MediaLibrary;
use System\Models\File;

/**
 * ImageCropper Model
 */
class ImageCropper extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'zakir_imagecropper_cropper';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = ['type', 'path'];

    protected $jsonable = ['data'];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];


    public function getSrc()
    {
        if(is_numeric($this->path)){
            return File::find($this->path)->getPath();
        }else{
            return MediaLibrary::url($this->path);
        }
    }
    public function beforeSave()
    {
        Resizer::clearFiles();
    }
}
