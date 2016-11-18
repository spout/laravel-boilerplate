<?php
namespace App\Models;

use Symfony\Component\Yaml\Yaml;

class Menu extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'attributes',
    ];

    public function __toString()
    {
        return $this->title;
    }

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class)->orderBy('sort');
    }

    public function getAttributesAttribute($attributes)
    {
        return Yaml::parse($attributes);
    }
}