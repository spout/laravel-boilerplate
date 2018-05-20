<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Amenity extends Model
{
    use TranslatableTrait;

    protected $guarded = [];
    public $timestamps = false;
    public static $translatableColumns = [
        'name',
    ];

    public static function verboseName()
    {
        return _i("amenity");
    }

    public static function verboseNamePlural()
    {
        return _i("amenities");
    }

    public function __toString()
    {
        return $this->name;
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}