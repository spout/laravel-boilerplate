<?php

namespace App\Models;

class Price extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public static function verboseName()
    {
        return _i("price");
    }

    public static function verboseNamePlural()
    {
        return _i("prices");
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}