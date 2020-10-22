<?php namespace Pensoft\InternalDocuments;

use System\Classes\PluginBase;
use Pensoft\Internaldocuments\Components\FilesForm;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
		return [
			FilesForm::class => 'filesform',
		];
    }

    public function registerSettings()
    {
    }
}
