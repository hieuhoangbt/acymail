<?php namespace Mail\MailDemo;

use Backend;
use System\Classes\PluginBase;

/**
 * MailDemo Plugin Information File
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
            'name'        => 'MailDemo',
            'description' => 'Manager mail in october',
            'author'      => 'Mail',
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
        return []; // Remove this line to activate

        return [
            'Mail\MailDemo\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'mail.maildemo.some_permission' => [
                'tab' => 'MailDemo',
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
            'maildemo' => [
                'label'       => 'Mail Info',
                'url'         => Backend::url('mail/maildemo/listmail'),
                'icon'        => 'icon-envelope-o',
                'permissions' => ['mail.maildemo.*'],
                'order'       => 500,
                'sideMenu' => [
                    'listmail' => [
                        'label' => 'List',
                        'icon' => 'icon-bars',
                        'url' => Backend::url('mail/maildemo/listmail'),
                        'permissions' => ['mail.maildemo.access_list'],
                    ],
                    'usersucriber' => [
                        'label' => 'User subcriber',
                        'icon' => 'icon-user',
                        'url' => Backend::url('mail/maildemo/usersucriber'),
                        'permissions' => ['mail.maildemo.access_usersucriber'],
                    ],
                    'mail' => [
                        'label' => 'Newsletter',
                        'icon' => 'icon-file-text-o',
                        'url' => Backend::url('mail/maildemo/mail'),
                        'permissions' => ['mail.maildemo.access_mail'],
                    ],
                ]
            ],
        ];
    }

}
