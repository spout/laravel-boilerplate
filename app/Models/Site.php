<?php

namespace App\Models;

class Site extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'slug';
    protected $fillable = [
        'domain',
        'name',
    ];

    public static function verboseName()
    {
        return _i("site");
    }

    public static function verboseNamePlural()
    {
        return _i("sites");
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function __toString()
    {
        return $this->slug;
    }
}