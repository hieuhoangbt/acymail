<?php namespace Mail\MailDemo\Models;

use Model;

/**
 * Campaigns Model
 */
class Campaigns extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'mail_maildemo_lists';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'name',
        'alias',
        'description',
        'type',
        'color',
    ];

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
            'conditions' => 'type = "list"'
        ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = 'campaign';
    }
    public function afterCreate()
    {
        $campaign = Campaigns::find($this->id);
        $campaign->type = 'campaign';
        $campaign->color = '';
        $alias = $this->getAlias($this->name);
        $campaign->alias = $alias;
        $campaign->save();
    }
    public static function getAlias($string) {
        $trans = array(
            "đ" => "d", "ă" => "a", "â" => "a", "á" => "a", "à" => "a",
            "ả" => "a", "ã" => "a", "ạ" => "a",
            "ấ" => "a", "ầ" => "a", "ẩ" => "a", "ẫ" => "a", "ậ" => "a",
            "ắ" => "a", "ằ" => "a", "ẳ" => "a", "ẵ" => "a", "ặ" => "a",
            "é" => "e", "è" => "e", "ẻ" => "e", "ẽ" => "e", "ẹ" => "e",
            "ế" => "e", "ề" => "e", "ể" => "e", "ễ" => "e", "ệ" => "e",
            "í" => "i", "ì" => "i", "ỉ" => "i", "ĩ" => "i", "ị" => "i",
            "ư" => "u", "ô" => "o", "ơ" => "o", "ê" => "e",
            "Ư" => "u", "Ô" => "o", "Ơ" => "o", "Ê" => "e",
            "ú" => "u", "ù" => "u", "ủ" => "u", "ũ" => "u", "ụ" => "u",
            "ứ" => "u", "ừ" => "u", "ử" => "u", "ữ" => "u", "ự" => "u",
            "ó" => "o", "ò" => "o", "ỏ" => "o", "õ" => "o", "ọ" => "o",
            "ớ" => "o", "ờ" => "o", "ở" => "o", "ỡ" => "o", "ợ" => "o",
            "ố" => "o", "ồ" => "o", "ổ" => "o", "ỗ" => "o", "ộ" => "o",
            "ú" => "u", "ù" => "u", "ủ" => "u", "ũ" => "u", "ụ" => "u",
            "ứ" => "u", "ừ" => "u", "ử" => "u", "ữ" => "u", "ự" => "u",
            "ý" => "y", "ỳ" => "y", "ỷ" => "y", "ỹ" => "y", "ỵ" => "y",
            "Ý" => "Y", "Ỳ" => "Y", "Ỷ" => "Y", "Ỹ" => "Y", "Ỵ" => "Y",
            "Đ" => "D", "Ă" => "A", "Â" => "A", "Á" => "A", "À" => "A",
            "Ả" => "A", "Ã" => "A", "Ạ" => "A",
            "Ấ" => "A", "Ầ" => "A", "Ẩ" => "A", "Ẫ" => "A", "Ậ" => "A",
            "Ắ" => "A", "Ằ" => "A", "Ẳ" => "A", "Ẵ" => "A", "Ặ" => "A",
            "É" => "E", "È" => "E", "Ẻ" => "E", "Ẽ" => "E", "Ẹ" => "E",
            "Ế" => "E", "Ề" => "E", "Ể" => "E", "Ễ" => "E", "Ệ" => "E",
            "Í" => "I", "Ì" => "I", "Ỉ" => "I", "Ĩ" => "I", "Ị" => "I",
            "Ư" => "U", "Ô" => "O", "Ơ" => "O", "Ê" => "E",
            "Ư" => "U", "Ô" => "O", "Ơ" => "O", "Ê" => "E",
            "Ú" => "U", "Ù" => "U", "Ủ" => "U", "Ũ" => "U", "Ụ" => "U",
            "Ứ" => "U", "Ừ" => "U", "Ử" => "U", "Ữ" => "U", "Ự" => "U",
            "Ó" => "O", "Ò" => "O", "Ỏ" => "O", "Õ" => "O", "Ọ" => "O",
            "Ớ" => "O", "Ờ" => "O", "Ở" => "O", "Ỡ" => "O", "Ợ" => "O",
            "Ố" => "O", "Ồ" => "O", "Ổ" => "O", "Ỗ" => "O", "Ộ" => "O",
            "Ú" => "U", "Ù" => "U", "Ủ" => "U", "Ũ" => "U", "Ụ" => "U",
            "Ứ" => "U", "Ừ" => "U", "Ử" => "U", "Ữ" => "U", "Ự" => "U",);

        //remove any '-' from the string they will be used as concatonater
        $str = str_replace('-', ' ', $string);

        $str = strtr($str, $trans);

        // remove any duplicate whitespace, and ensure all characters are alphanumeric
        $str = preg_replace(array('/\s+/', '/[^A-Za-z0-9\-]/'), array('-', ''), $str);

        // lowercase and trim
        $str = trim(strtolower($str));

        return $str;
    }
}