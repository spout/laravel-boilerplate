<?php

namespace App\Models;

class Favorite extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}