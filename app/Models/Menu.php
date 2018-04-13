<?php

namespace App\Models;

class Menu extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'slug';

    protected $fillable = [
        'title',
        'slug',
        'attributes',
    ];

    public static function verboseName()
    {
        return _i("menu");
    }

    public static function verboseNamePlural()
    {
        return _i("menus");
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class)->orderBy('sort');
    }

    public function getAttributesToArrayAttribute($value)
    {
        return json_decode($this->getAttribute('attributes'), true);
    }
}