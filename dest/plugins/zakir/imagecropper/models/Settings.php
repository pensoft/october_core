<?php namespace Zakir\ImageCropper\Models;

use Model;

class Settings extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    public $settingsCode = 'zakir_imagecropper_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
}