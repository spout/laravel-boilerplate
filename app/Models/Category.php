<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;
use App\Scopes\OrderScope;

class Category extends Model
{
    use TranslatableTrait;

    protected $guarded = ['tags'];
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

    protected static function boot()
    {
        parent::boot();

        $locale = \LaravelLocalization::getCurrentLocale();

        static::addGlobalScope(new OrderScope("title_plural_{$locale}"));
    }

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

    public function amenities()
    {
        return $this->hasMany(Amenity::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function __toString()
    {
        return $this->title_plural;
    }

    public function getAbsoluteUrlAttribute()
    {
        return route('products.index', ['category_slug_plural' => $this->slug_plural]);
    }

    public function getMarkerIconUrlAttribute()
    {
        $url = $this->marker_icon;

        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            $url = asset($url);
        }

        return $url;
    }
}