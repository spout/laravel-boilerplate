<?php
namespace App\Models;

class Category extends Model
{
    protected $fillable = [
        'title',
        'parent_id',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function __toString()
    {
        return $this->title;
    }

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }
}