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

    protected $rules = [
        'title' => 'required|max:255',
        'slug' => 'required',
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
        return $this->hasMany('App\Models\MenuItem')->orderBy('sort');
    }

    public function getAttributesAttribute($attributes)
    {
        return Yaml::parse($attributes);
    }
}