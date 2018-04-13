<?php

namespace App\Models;

class Offer extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    public static function verboseName()
    {
        return _i("offer");
    }

    public static function verboseNamePlural()
    {
        return _i("offers");
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}