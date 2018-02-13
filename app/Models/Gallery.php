<?php

namespace App\Models;

class Gallery extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}