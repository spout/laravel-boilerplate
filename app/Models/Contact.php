<?php

namespace App\Models;

class Contact extends Model
{
    protected $fillable = [
        'email',
        'subject',
        'message',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public static function verboseName()
    {
        return _i("contact");
    }

    public static function verboseNamePlural()
    {
        return _i("contacts");
    }

    public function __toString()
    {
        return $this->subject;
    }
}