<?php

namespace App\Models;

class NewsletterEmail extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];

    public static function verboseName()
    {
        return _i("newsletter email");
    }

    public static function verboseNamePlural()
    {
        return _i("newsletter emails");
    }

    public function __toString()
    {
        return $this->email;
    }
}