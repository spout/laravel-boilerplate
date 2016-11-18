<?php
namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Content extends Model
{
    use TranslatableTrait;

    protected $fillable = [
        'title',
        'slug',
        'path',
        'content',
    ];

    protected $translatableFields = [
        'title',
        'slug',
        'path',
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