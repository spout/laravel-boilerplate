<?php

namespace App\Models;

class PriceItem extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public static function verboseName()
    {
        return _i("price item");
    }

    public static function verboseNamePlural()
    {
        return _i("price items");
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    public function category()
    {
        return $this->belongsTo(PriceCategory::class);
    }
}