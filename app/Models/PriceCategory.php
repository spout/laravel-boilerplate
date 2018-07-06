<?php

namespace App\Models;

class PriceCategory extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public static function verboseName()
    {
        return _i("price category");
    }

    public static function verboseNamePlural()
    {
        return _i("price categories");
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}