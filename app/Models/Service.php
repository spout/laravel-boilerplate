<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Service extends Model
{
    use TranslatableTrait;

    protected $guarded = [];
    public $timestamps = false;
    public static $translatableColumns = [
        'name',
    ];

    public static function verboseName()
    {
        return _i("service");
    }

    public static function verboseNamePlural()
    {
        return _i("services");
    }

    public function __toString()
    {
        return $this->name;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->using(ProductService::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}