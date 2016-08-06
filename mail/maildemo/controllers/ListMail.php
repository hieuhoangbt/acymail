<?php namespace Mail\MailDemo\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Mail\MailDemo\Models\Lists;
use Flash;

/**
 * List Mail Back-end Controller
 */
class ListMail extends Controller
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

        BackendMenu::setContext('Mail.MailDemo', 'maildemo', 'listmail');
    }
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $listmail) {
                if (!$re = Lists::find($listmail)) continue;
                $re->delete();
            }

            Flash::success('Deleted');
        }
        else {
            Flash::error('Failed');
        }

        return $this->listRefresh();
    }
    public function listExtendQuery($query){

        return $query->where('type', '=', 'list');
    }

}