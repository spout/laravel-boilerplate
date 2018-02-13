<?php

namespace App\Models;

class Photo extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}