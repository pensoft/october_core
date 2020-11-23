<?php namespace Pensoft\Organization;

use System\Classes\PluginBase;
use Rainlab\User\Controllers\Users as UsersController;
use Pensoft\Partners\Models\Partners as Partners;

class Plugin extends PluginBase
{
    public function boot()
	{
		UsersController::extendFormFields(function($form, $model, $context){

			$form->addTabFields([
				'partner' => [
					'label' => 'Organization/Partner',
					'nameFrom' => 'title',
					'emptyOption' => '-- choose --',
					'span'  => 'auto',
					'type'  => 'dropdown',
					'tab'  => 'rainlab.user::lang.user.account',
					'options' => Partners::lists('title', 'id')
				]
			]);

		});
	}
}