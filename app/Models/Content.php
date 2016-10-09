<?php
namespace App\Models;

class Content extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    protected $rules = [
        'title' => 'required|max:255',
        'slug' => 'required',
        'content' => 'required',
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