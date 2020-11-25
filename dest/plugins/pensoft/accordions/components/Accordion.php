<?php

namespace pensoft\Accordions\Components;

use pensoft\Accordions\Models\Category;

class Accordion extends \Cms\Classes\ComponentBase {

    // $this->property();

    public function componentDetails(){
        return [
            'name'          => 'accordion',
            'description'   => ''
        ];
    }

    public function onRun()
    {
        // This code will be executed when the page or layout is
        // loaded and the component is attached to it.

        // $this->page['vvv'] = 'value'; // Inject some variable to the page
        $this->addJs('assets/js/jquery-ui.min.js');
        $this->addCss('assets/css/jquery-ui.css');
    }

    public function defineProperties(){
        return [
            'maxItems' => [
                'title' => 'Max items',
                'description' => 'Max items allowed',
                'default' => 10,
            ],
            'accordion' => [
                'title' => 'Accordion',
                'required' => true,
                'type' => 'dropdown',
                'description' => 'Select accordion list',
            ],
            'elementId' => [
                'title' => 'Element id name',
                'description' => 'Id name',
                'required' => true
            ],
            'active' => [
                'title' => 'Active',
                'description' => 'Which panel is currently open',
                'default' => '0',
            ],
            'collapsible' => [
                'title' => 'Collapsible',
                'description' => 'Whether all the sections can be closed at once. Allows collapsing the active section',
                'default' => 'false',
                'type' => 'dropdown',
            ],
            'heightStyle' => [
                'title' => 'heightStyle',
                'description' => 'Controls the height of the accordion and each panel. Possible values',
                'default' => 'auto',
                'type' => 'dropdown',
            ],
            'iconsHeader' => [
                'title' => 'Icons header',
                'description' => '',
                'default' => 'ui-icon-triangle-1-e',
                'type' => 'dropdown',
            ],
            'iconsHeaderActive' => [
                'title' => 'Icons header active',
                'description' => '',
                'default' => 'ui-icon-triangle-1-s',
                'type' => 'dropdown',
            ]
        ];
    }

    public function getIconsHeaderOptions()
    {
        return [
            "ui-icon-blank" => "ui-icon-blank",
            "ui-icon-carat-1-n" => "ui-icon-carat-1-n",
            "ui-icon-carat-1-ne" => "ui-icon-carat-1-ne",
            "ui-icon-carat-1-e" => "ui-icon-carat-1-e",
            "ui-icon-carat-1-se" => "ui-icon-carat-1-se",
            "ui-icon-carat-1-s" => "ui-icon-carat-1-s",
            "ui-icon-carat-1-sw" => "ui-icon-carat-1-sw",
            "ui-icon-carat-1-w" => "ui-icon-carat-1-w",
            "ui-icon-carat-1-nw" => "ui-icon-carat-1-nw",
            "ui-icon-carat-2-n-s" => "ui-icon-carat-2-n-s",
            "ui-icon-carat-2-e-w" => "ui-icon-carat-2-e-w",
            "ui-icon-triangle-1-n" => "ui-icon-triangle-1-n",
            "ui-icon-triangle-1-ne" => "ui-icon-triangle-1-ne",
            "ui-icon-triangle-1-e" => "ui-icon-triangle-1-e",
            "ui-icon-triangle-1-se" => "ui-icon-triangle-1-se",
            "ui-icon-triangle-1-s" => "ui-icon-triangle-1-s",
            "ui-icon-triangle-1-sw" => "ui-icon-triangle-1-sw",
            "ui-icon-triangle-1-w" => "ui-icon-triangle-1-w",
            "ui-icon-triangle-1-nw" => "ui-icon-triangle-1-nw",
            "ui-icon-triangle-2-n-s" => "ui-icon-triangle-2-n-s",
            "ui-icon-triangle-2-e-w" => "ui-icon-triangle-2-e-w",
            "ui-icon-arrow-1-n" => "ui-icon-arrow-1-n",
            "ui-icon-arrow-1-ne" => "ui-icon-arrow-1-ne",
            "ui-icon-arrow-1-e" => "ui-icon-arrow-1-e",
            "ui-icon-arrow-1-se" => "ui-icon-arrow-1-se",
            "ui-icon-arrow-1-s" => "ui-icon-arrow-1-s",
            "ui-icon-arrow-1-sw" => "ui-icon-arrow-1-sw",
            "ui-icon-arrow-1-w" => "ui-icon-arrow-1-w",
            "ui-icon-arrow-1-nw" => "ui-icon-arrow-1-nw",
            "ui-icon-arrow-2-n-s" => "ui-icon-arrow-2-n-s",
            "ui-icon-arrow-2-ne-sw" => "ui-icon-arrow-2-ne-sw",
            "ui-icon-arrow-2-e-w" => "ui-icon-arrow-2-e-w",
            "ui-icon-arrow-2-se-nw" => "ui-icon-arrow-2-se-nw",
            "ui-icon-arrowstop-1-n" => "ui-icon-arrowstop-1-n",
            "ui-icon-arrowstop-1-e" => "ui-icon-arrowstop-1-e",
            "ui-icon-arrowstop-1-s" => "ui-icon-arrowstop-1-s",
            "ui-icon-arrowstop-1-w" => "ui-icon-arrowstop-1-w",
            "ui-icon-arrowthick-1-n" => "ui-icon-arrowthick-1-n",
            "ui-icon-arrowthick-1-ne" => "ui-icon-arrowthick-1-ne",
            "ui-icon-arrowthick-1-e" => "ui-icon-arrowthick-1-e",
            "ui-icon-arrowthick-1-se" => "ui-icon-arrowthick-1-se",
            "ui-icon-arrowthick-1-s" => "ui-icon-arrowthick-1-s",
            "ui-icon-arrowthick-1-sw" => "ui-icon-arrowthick-1-sw",
            "ui-icon-arrowthick-1-w" => "ui-icon-arrowthick-1-w",
            "ui-icon-arrowthick-1-nw" => "ui-icon-arrowthick-1-nw",
            "ui-icon-arrowthick-2-n-s" => "ui-icon-arrowthick-2-n-s",
            "ui-icon-arrowthick-2-ne-sw" => "ui-icon-arrowthick-2-ne-sw",
            "ui-icon-arrowthick-2-e-w" => "ui-icon-arrowthick-2-e-w",
            "ui-icon-arrowthick-2-se-nw" => "ui-icon-arrowthick-2-se-nw",
            "ui-icon-arrowthickstop-1-n" => "ui-icon-arrowthickstop-1-n",
            "ui-icon-arrowthickstop-1-e" => "ui-icon-arrowthickstop-1-e",
            "ui-icon-arrowthickstop-1-s" => "ui-icon-arrowthickstop-1-s",
            "ui-icon-arrowthickstop-1-w" => "ui-icon-arrowthickstop-1-w",
            "ui-icon-arrowreturnthick-1-w" => "ui-icon-arrowreturnthick-1-w",
            "ui-icon-arrowreturnthick-1-n" => "ui-icon-arrowreturnthick-1-n",
            "ui-icon-arrowreturnthick-1-e" => "ui-icon-arrowreturnthick-1-e",
            "ui-icon-arrowreturnthick-1-s" => "ui-icon-arrowreturnthick-1-s",
            "ui-icon-arrowreturn-1-w" => "ui-icon-arrowreturn-1-w",
            "ui-icon-arrowreturn-1-n" => "ui-icon-arrowreturn-1-n",
            "ui-icon-arrowreturn-1-e" => "ui-icon-arrowreturn-1-e",
            "ui-icon-arrowreturn-1-s" => "ui-icon-arrowreturn-1-s",
            "ui-icon-arrowrefresh-1-w" => "ui-icon-arrowrefresh-1-w",
            "ui-icon-arrowrefresh-1-n" => "ui-icon-arrowrefresh-1-n",
            "ui-icon-arrowrefresh-1-e" => "ui-icon-arrowrefresh-1-e",
            "ui-icon-arrowrefresh-1-s" => "ui-icon-arrowrefresh-1-s",
            "ui-icon-arrow-4" => "ui-icon-arrow-4",
            "ui-icon-arrow-4-diag" => "ui-icon-arrow-4-diag",
            "ui-icon-extlink" => "ui-icon-extlink",
            "ui-icon-newwin" => "ui-icon-newwin",
            "ui-icon-refresh" => "ui-icon-refresh",
            "ui-icon-shuffle" => "ui-icon-shuffle",
            "ui-icon-transfer-e-w" => "ui-icon-transfer-e-w",
            "ui-icon-transferthick-e-w" => "ui-icon-transferthick-e-w",
            "ui-icon-folder-collapsed" => "ui-icon-folder-collapsed",
            "ui-icon-folder-open" => "ui-icon-folder-open",
            "ui-icon-document" => "ui-icon-document",
            "ui-icon-document-b" => "ui-icon-document-b",
            "ui-icon-note" => "ui-icon-note",
            "ui-icon-mail-closed" => "ui-icon-mail-closed",
            "ui-icon-mail-open" => "ui-icon-mail-open",
            "ui-icon-suitcase" => "ui-icon-suitcase",
            "ui-icon-comment" => "ui-icon-comment",
            "ui-icon-person" => "ui-icon-person",
            "ui-icon-print" => "ui-icon-print",
            "ui-icon-trash" => "ui-icon-trash",
            "ui-icon-locked" => "ui-icon-locked",
            "ui-icon-unlocked" => "ui-icon-unlocked",
            "ui-icon-bookmark" => "ui-icon-bookmark",
            "ui-icon-tag" => "ui-icon-tag",
            "ui-icon-home" => "ui-icon-home",
            "ui-icon-flag" => "ui-icon-flag",
            "ui-icon-calculator" => "ui-icon-calculator",
            "ui-icon-cart" => "ui-icon-cart",
            "ui-icon-pencil" => "ui-icon-pencil",
            "ui-icon-clock" => "ui-icon-clock",
            "ui-icon-disk" => "ui-icon-disk",
            "ui-icon-calendar" => "ui-icon-calendar",
            "ui-icon-zoomin" => "ui-icon-zoomin",
            "ui-icon-zoomout" => "ui-icon-zoomout",
            "ui-icon-search" => "ui-icon-search",
            "ui-icon-wrench" => "ui-icon-wrench",
            "ui-icon-gear" => "ui-icon-gear",
            "ui-icon-heart" => "ui-icon-heart",
            "ui-icon-star" => "ui-icon-star",
            "ui-icon-link" => "ui-icon-link",
            "ui-icon-cancel" => "ui-icon-cancel",
            "ui-icon-plus" => "ui-icon-plus",
            "ui-icon-plusthick" => "ui-icon-plusthick",
            "ui-icon-minus" => "ui-icon-minus",
            "ui-icon-minusthick" => "ui-icon-minusthick",
            "ui-icon-close" => "ui-icon-close",
            "ui-icon-closethick" => "ui-icon-closethick",
            "ui-icon-key" => "ui-icon-key",
            "ui-icon-lightbulb" => "ui-icon-lightbulb",
            "ui-icon-scissors" => "ui-icon-scissors",
            "ui-icon-clipboard" => "ui-icon-clipboard",
            "ui-icon-copy" => "ui-icon-copy",
            "ui-icon-contact" => "ui-icon-contact",
            "ui-icon-image" => "ui-icon-image",
            "ui-icon-video" => "ui-icon-video",
            "ui-icon-script" => "ui-icon-script",
            "ui-icon-alert" => "ui-icon-alert",
            "ui-icon-info" => "ui-icon-info",
            "ui-icon-notice" => "ui-icon-notice",
            "ui-icon-help" => "ui-icon-help",
            "ui-icon-check" => "ui-icon-check",
            "ui-icon-bullet" => "ui-icon-bullet",
            "ui-icon-radio-off" => "ui-icon-radio-off",
            "ui-icon-radio-on" => "ui-icon-radio-on",
            "ui-icon-pin-w" => "ui-icon-pin-w",
            "ui-icon-pin-s" => "ui-icon-pin-s",
            "ui-icon-play" => "ui-icon-play",
            "ui-icon-pause" => "ui-icon-pause",
            "ui-icon-seek-next" => "ui-icon-seek-next",
            "ui-icon-seek-prev" => "ui-icon-seek-prev",
            "ui-icon-seek-end" => "ui-icon-seek-end",
            "ui-icon-seek-first" => "ui-icon-seek-first",
            "ui-icon-stop" => "ui-icon-stop",
            "ui-icon-eject" => "ui-icon-eject",
            "ui-icon-volume-off" => "ui-icon-volume-off",
            "ui-icon-volume-on" => "ui-icon-volume-on",
            "ui-icon-power" => "ui-icon-power",
            "ui-icon-signal-diag" => "ui-icon-signal-diag",
            "ui-icon-signal" => "ui-icon-signal",
            "ui-icon-battery-0" => "ui-icon-battery-0",
            "ui-icon-battery-1" => "ui-icon-battery-1",
            "ui-icon-battery-2" => "ui-icon-battery-2",
            "ui-icon-battery-3" => "ui-icon-battery-3",
            "ui-icon-circle-plus" => "ui-icon-circle-plus",
            "ui-icon-circle-minus" => "ui-icon-circle-minus",
            "ui-icon-circle-close" => "ui-icon-circle-close",
            "ui-icon-circle-triangle-e" => "ui-icon-circle-triangle-e",
            "ui-icon-circle-triangle-s" => "ui-icon-circle-triangle-s",
            "ui-icon-circle-triangle-w" => "ui-icon-circle-triangle-w",
            "ui-icon-circle-triangle-n" => "ui-icon-circle-triangle-n",
            "ui-icon-circle-arrow-e" => "ui-icon-circle-arrow-e",
            "ui-icon-circle-arrow-s" => "ui-icon-circle-arrow-s",
            "ui-icon-circle-arrow-w" => "ui-icon-circle-arrow-w",
            "ui-icon-circle-arrow-n" => "ui-icon-circle-arrow-n",
            "ui-icon-circle-zoomin" => "ui-icon-circle-zoomin",
            "ui-icon-circle-zoomout" => "ui-icon-circle-zoomout",
            "ui-icon-circle-check" => "ui-icon-circle-check",
            "ui-icon-circlesmall-plus" => "ui-icon-circlesmall-plus",
            "ui-icon-circlesmall-minus" => "ui-icon-circlesmall-minus",
            "ui-icon-circlesmall-close" => "ui-icon-circlesmall-close",
            "ui-icon-squaresmall-plus" => "ui-icon-squaresmall-plus",
            "ui-icon-squaresmall-minus" => "ui-icon-squaresmall-minus",
            "ui-icon-squaresmall-close" => "ui-icon-squaresmall-close",
            "ui-icon-grip-dotted-vertical" => "ui-icon-grip-dotted-vertical",
            "ui-icon-grip-dotted-horizontal" => "ui-icon-grip-dotted-horizontal",
            "ui-icon-grip-solid-vertical" => "ui-icon-grip-solid-vertical",
            "ui-icon-grip-solid-horizontal" => "ui-icon-grip-solid-horizontal",
            "ui-icon-gripsmall-diagonal-se" => "ui-icon-gripsmall-diagonal-se",
            "ui-icon-grip-diagonal-se" => "ui-icon-grip-diagonal-se",
        ];
    }

    public function getIconsheaderactiveOptions(){
        return $this->getIconsHeaderOptions();
    }

    public function getHeightstyleOptions(){
        return [
            "auto" => 'auto',
            "fill" => 'fill',
            "content" => 'content'
        ];
    }

    public function getCollapsibleOptions(){
        return [
            'false' => 'false',
            'true' => 'true'
        ];
    }

    public function getAccordionOptions(){
        return Category::all()->lists('name', 'id');
    }

    public function getAccordion(){
        return Category::find($this->property('accordion'));
    }
}