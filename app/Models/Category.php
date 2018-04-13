<?php

namespace App\Models;

class Category extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public static function verboseName()
    {
        return _i("category");
    }

    public static function verboseNamePlural()
    {
        return _i("categories");
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function __toString()
    {
        return $this->title_plural;
    }
}