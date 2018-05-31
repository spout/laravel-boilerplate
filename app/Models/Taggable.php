<?php

namespace App\Models;

class Taggable extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public static function verboseName()
    {
        return _i("taggable");
    }

    public static function verboseNamePlural()
    {
        return _i("taggables");
    }
}