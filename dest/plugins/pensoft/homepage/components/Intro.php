<?php namespace Pensoft\Homepage\Components;

use Cms\Classes\ComponentBase;
use Pensoft\Homepage\Models\HomepageIntro;
use Jenssegers\Agent\Agent;

class Intro extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Intro Component',
            'description' => 'Homepage intro text'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

	public function getHomepageIntro(){


		$intro = HomepageIntro::get();
		$intro->map(function ($item, $key) {
			$Agent = new Agent();
			if ($Agent->isMobile()) {
				// you're a mobile device
				$item->image = $item->mobile_image;
			}
			return $item;
		});

		return $intro;
	}
}
