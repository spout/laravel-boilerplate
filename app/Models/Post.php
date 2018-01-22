<?php

namespace App\Models;

class Post extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getAbsoluteUrlAttribute()
    {
        return route('blog.show', ['pk' => $this->pk, 'slug' => $this->slug]);
    }
}