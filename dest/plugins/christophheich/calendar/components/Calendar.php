<?php namespace ChristophHeich\Calendar\Components;
/**
 * Created by PhpStorm.
 * User: Christoph Heich
 * Date: 02.06.2018
 * Time: 17:36
 */

use Cms\Classes\ComponentBase;

class Calendar extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Calendar',
            'description' => 'Displays a JavaScript event calendar.'
        ];
    }

    // This will execute on startup and add the css and js files to the page.
    public function onRun()
    {
        // CSS
        $this->addCss('assets/core/main.css');
        $this->addCss('assets/daygrid/main.min.css');
        $this->addCss('assets/timegrid/main.css');
        $this->addCss('assets/list/main.css');
        $this->addCss('assets/list/main.css');
        $this->addCss('assets/bootstrap/main.css');

        // JS
        $this->addJs('assets/core/main.js');
        $this->addJs('assets/core/locales-all.min.js');
        $this->addJs('assets/daygrid/main.js');
        $this->addJs('assets/timegrid/main.js');
        $this->addJs('assets/list/main.js');
        $this->addJs('assets/bootstrap/main.js');
    }

    public function defineProperties()
    {
        return [
            'default' => [
                'title'         => 'Default',
                'description'   => 'Decide whether to use custom markup or the default markup provided by this plugin. While "true" is the default markup and false the custom markup!',
                'type'          => 'checkbox',
                'default'       => 'true'
            ],
            'limit' => [
                'title'             => 'Limit',
                'description'       => 'You can limit the amount of events shown. While "null" equals to no limit and "30" says that the latest 30 events will be shown.',
                'default'           => 'null',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$|^null$',
                'validationMessage' => 'You can only use numeric symbols eg. 10 or null.'
            ],
            'category' => [
                'title'             => 'Category',
                'description'       => 'You can set the events in categories which will be retrieved. While "null" means all events will be fetched and [3, 6, 1] only the category 3, 6, and 1 will be fetched.',
                'default'           => 'null',
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$|^null$',
                'validationMessage' => 'You can only use an array of numeric symbols eg. [10], [1, 5, 19] or null.'
            ],
            'language' => [
                'title'         => 'Language',
                'description'   => 'Set the language of FullCalendar. This will add the necessary JavaScript localization files!',
                'type'          => 'dropdown',
                'default'       => 'en'
            ]
        ];
    }

    public function getLanguageOptions()
    {
        return [
            'en'        => 'English',
            'de'        => 'German',
            'af'        => 'Afrikaans',
            'ar'        => 'ar',
            'ar-dz'     => 'ar-dz',
            'ar-kw'     => 'ar-kw',
            'ar-ly'     => 'ar-ly',
            'ar-ma'     => 'ar-ma',
            'ar-sa'     => 'ar-sa',
            'ar-tn'     => 'ar-tn',
            'bg'        => 'bg',
            'bs'        => 'bs',
            'ca'        => 'ca',
            'cs'        => 'cs',
            'da'        => 'da',
            'de-at'     => 'de-at',
            'de-ch'     => 'de-ch',
            'el'        => 'el',
            'en-au'     => 'en-au',
            'en-ca'     => 'en-ca',
            'en-gb'     => 'en-gb',
            'en-ie'     => 'en-ie',
            'en-nz'     => 'en-nz',
            'es'        => 'es',
            'es-do'     => 'es-do',
            'es-us'     => 'es-us',
            'et'        => 'et',
            'eu'        => 'eu',
            'fa'        => 'fa',
            'fi'        => 'fi',
            'fr'        => 'fr',
            'fr-ca'     => 'fr-ca',
            'fr-ch'     => 'fr-ch',
            'gl'        => 'gl',
            'he'        => 'he',
            'hi'        => 'hi',
            'hr'        => 'hr',
            'hu'        => 'hu',
            'id'        => 'id',
            'is'        => 'is',
            'it'        => 'it',
            'ja'        => 'ja',
            'ka'        => 'ka',
            'kk'        => 'kk',
            'ko'        => 'ko',
            'lb'        => 'lb',
            'lt'        => 'lt',
            'lv'        => 'lv',
            'mk'        => 'mk',
            'ms'        => 'ms',
            'ms-my'     => 'ms-my',
            'nb'        => 'nb',
            'nl'        => 'nl',
            'nl-be'     => 'nl-be',
            'nn'        => 'nn',
            'pl'        => 'pl',
            'pt'        => 'pt',
            'pr-br'     => 'pr-br',
            'ro'        => 'ro',
            'ru'        => 'ru',
            'sk'        => 'sk',
            'sl'        => 'sl',
            'sq'        => 'sq',
            'sr'        => 'sr',
            'sr-cyrl'   => 'sr-cyrl',
            'sv'        => 'sv',
            'th'        => 'th',
            'tr'        => 'tr',
            'uk'        => 'uk',
            'vi'        => 'vi',
            'zh-cn'     => 'zh-cn',
            'zh-tw'     => 'zh-tw'
        ];
    }
}