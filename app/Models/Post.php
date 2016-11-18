<?php
namespace App\Models;

class Post extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'content',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function __toString()
    {
        return $this->title;
    }

    public function getAbsoluteUrlAttribute()
    {
        //return route('blog.show', ['blog' => $this->id]);
        return '#';
    }
}