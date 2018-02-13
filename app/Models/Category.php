<?php

namespace App\Models;

class Category extends Model
{
    protected $fillable = [
        'title',
        'parent_id',
    ];

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}