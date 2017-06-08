<?php
namespace App\Models;

class Menu extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'attributes',
    ];

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class)->orderBy('sort');
    }
}