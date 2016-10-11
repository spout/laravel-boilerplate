<?php
namespace App\Models;

class Content extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    public function __toString()
    {
        return $this->title;
    }

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }
}