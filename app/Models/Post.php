<?php
namespace App\Models;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    public function __toString()
    {
        return $this->title;
    }

    public function getAbsoluteUrlAttribute()
    {
        //return route('blog.show', ['id' => $this->id]);
        return '#';
    }
}