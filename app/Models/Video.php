<?php

namespace App\Models;

use App\Models\Traits\PlaceholdableTrait;

class Video extends Model
{
    use PlaceholdableTrait;

    protected $guarded = [];

    public static function verboseName()
    {
        return _i("video");
    }

    public static function verboseNamePlural()
    {
        return _i("videos");
    }

    public function __toString()
    {
        return $this->url;
    }
}