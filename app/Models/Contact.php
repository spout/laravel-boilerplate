<?php

namespace App\Models;

class Contact extends Model
{
    protected $fillable = [
        'email',
        'subject',
        'message',
    ];
    protected $dates = ['created_at', 'updated_at'];

    public function __toString()
    {
        return $this->subject;
    }
}