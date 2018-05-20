<?php

namespace App\Models;

class RichText extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public static function verboseName()
    {
        return _i("rich text");
    }

    public static function verboseNamePlural()
    {
        return _i("rich texts");
    }
}