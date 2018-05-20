<?php

namespace App\Models;

class Map extends Model
{
    public $timestamps = false;
    protected $guarded = ['location'];

    public static function verboseName()
    {
        return _i("map");
    }

    public static function verboseNamePlural()
    {
        return _i("maps");
    }
}