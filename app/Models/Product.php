<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Product extends Model
{
    use TranslatableTrait;

    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [
        'created_at',
        'updated_at',
        'location',
    ];
    public static $translatableColumns = [
        'title',
        'slug',
        'content',
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

    public function getAbsoluteUrlAttribute()
    {
        $locale = \LaravelLocalization::getCurrentLocale();

        return route('products.show', [
            'category_slug_singular' => $this->category->{"slug_singular_{$locale}"},
            'slug' => $this->{"slug_{$locale}"}
        ]);
    }

    public function getFeaturedImageThumbAttribute($value)
    {
        if (empty($this->featured_image)) {
            return 'http://via.placeholder.com/480x360';
        }

        return route('imagecache', ['template' => 'large', 'filename' => $this->featured_image]);
    }
}