<?php
namespace App\Models;

class Contact extends Model
{
    protected $fillable = [
        'email',
        'subject',
        'message',
    ];

    public function __toString()
    {
        return $this->subject;
    }
}