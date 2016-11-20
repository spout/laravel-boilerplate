<?php
namespace App\Models;

class Post extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at'
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
        return route('blog.show', ['pk' => $this->pk, 'slug' => $this->slug]);
    }
}