<?php

namespace App\Models;

class Offer extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}