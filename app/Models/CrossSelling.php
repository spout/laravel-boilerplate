<?php

namespace App\Models;

class CrossSelling extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public static function verboseName()
    {
        return _i("cross selling");
    }

    public static function verboseNamePlural()
    {
        return _i("cross sellings");
    }
}