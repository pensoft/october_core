<?php namespace Pensoft\Homepage;

use Backend;
use System\Classes\PluginBase;

/**
 * Homepage Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Homepage',
            'description' => 'Homepage intro',
            'author'      => 'Pensoft',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Pensoft\Homepage\Components\Intro' => 'homepage_intro',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'pensoft.homepage.some_permission' => [
                'tab' => 'Homepage',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'homepage' => [
                'label'       => 'Homepage',
                'url'         => Backend::url('pensoft/homepage/homepageintrocontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['pensoft.homepage.*'],
                'order'       => 500,
            ],
        ];
    }
}
