<?php

namespace App\Models;

class Newsletter extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];

    public function __toString()
    {
        return $this->email;
    }
}