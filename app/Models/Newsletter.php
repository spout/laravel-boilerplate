<?php

namespace App\Models;

class Newsletter extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];

    public static function verboseName()
    {
        return _i("newsletter");
    }

    public static function verboseNamePlural()
    {
        return _i("newsletters");
    }

    public function __toString()
    {
        return $this->email;
    }
}