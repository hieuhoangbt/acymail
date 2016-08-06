<?php namespace Mail\MailDemo\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Mail\MailDemo\Models\UserSucribers;
use Flash;
use Request;
use Input;
use System\Models\MailSettings;

/**
 * User Sucriber Back-end Controller
 */
class UserSucriber extends Controller
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

        BackendMenu::setContext('Mail.MailDemo', 'maildemo', 'usersucriber');
    }
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $listmail) {
                if (!$re = UserSucribers::find($listmail)) continue;
                $re->delete();
            }

            Flash::success('Deleted');
        }
        else {
            Flash::error('Failed');
        }

        return $this->listRefresh();
    }
    public function onSend()
    {
        $data=post('UserSucribers');
        //dump($data['email']);die;//Send mail

    }
}