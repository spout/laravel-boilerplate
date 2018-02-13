<?php

namespace App\Models;

class Advert extends Model
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
}