<?php

namespace App\Models;

class Product extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public static function verboseName()
    {
        return _i("product");
    }

    public static function verboseNamePlural()
    {
        return _i("products");
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function prices()
    {
        return $this->morphMany(Price::class, 'priceable');
    }
}