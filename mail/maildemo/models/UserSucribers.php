<?php namespace Mail\MailDemo\Models;

use Model;
use Request;


/**
 * UserSucribers Model
 */
class UserSucribers extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mail_maildemo_user_sucribers';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [
        'listmail' => [
            'Mail\MailDemo\Models\Lists',
            'table'=>'mail_maildemo_list_sub',
            'key' =>'subcriber_id',
            'otherKey' => 'list_id',
            'conditions' => 'type = "list"'
        ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
    public function getReceiveOptions($keyValue = null)
    {
        return ['text' => 'text','html'=>'html'];
    }
    public function afterCreate(){
        $user = UserSucribers::find($this->id);
        $user->ip = Request::ip();
        $user->save();
    }


}