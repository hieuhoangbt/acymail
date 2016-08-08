<?php namespace Mail\MailDemo\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Campaign Back-end Controller
 */
class Campaign extends Controller
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

        BackendMenu::setContext('Mail.MailDemo', 'maildemo', 'campaign');
    }
    public function listExtendQuery($query){

        return $query->where('type', '=', 'campaign');
    }

}