<?php
namespace App\Models;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    protected $rules = [
        'title' => 'required|max:255',
        'content' => 'required',
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