<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Category extends Model
{
    use TranslatableTrait;

    protected $guarded = [];
    public $timestamps = false;
    public static $translatableColumns = [
        'title_singular',
        'title_plural',
        'slug_singular',
        'slug_plural',
        'description',
        'h1',
        'meta_description'
    ];

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

    public function getAbsoluteUrlAttribute()
    {
        return route('products.index', ['category_slug_plural' => $this->slug_plural]);
    }
}