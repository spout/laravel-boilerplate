<?php
namespace App\Models;

class Category extends Model
{
    protected $fillable = [
        'title',
        'parent_id',
    ];

    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }
}