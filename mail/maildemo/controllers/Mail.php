<?php namespace Mail\MailDemo\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Mail Back-end Controller
 */
class Mail extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Mail.MailDemo', 'maildemo', 'mail');
    }
}