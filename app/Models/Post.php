<?php

namespace App\Models;

class Post extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public static function verboseName()
    {
        return _i("post");
    }

    public static function verboseNamePlural()
    {
        return _i("posts");
    }

    public function getAbsoluteUrlAttribute()
    {
        return route('blog.show', ['pk' => $this->pk, 'slug' => $this->slug]);
    }
}