<?php
namespace App\Models;

class Snippet extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];
}