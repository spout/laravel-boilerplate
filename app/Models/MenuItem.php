<?php
namespace App\Models;

class MenuItem extends Model
{
    protected $guarded = [];

    public function __toString()
    {
        return $this->title;
    }

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}