<?php namespace Mail\MailDemo\Models;

use Model;

/**
 * Mails Model
 */
class Mails extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mail_maildemo_mails';

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
        'list' => [
            'Mail\MailDemo\Models\Lists',
            'table'=>'mail_maildemo_mail_lists',
            'key' =>'mail_id',
            'otherKey' => 'list_id',
        ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'file' => ['System\Models\File'],
    ];
    public $attachMany = [];

}