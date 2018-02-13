<?php

namespace App\Models;

class Category extends Model
{
    protected $fillable = [
        'title',
        'parent_id',
    ];

    public $timestamps = false;

    public function adverts()
    {
        return $this->hasMany(Advert::class);
    }
}