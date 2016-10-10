<?php
namespace App\Models;

class Contact extends Model
{
    protected $fillable = [
        'email',
        'subject',
        'message',
    ];
    protected $rules = [
        'email' => 'required',
        'subject' => 'required',
        'message' => 'required',
    ];

    public function __toString()
    {
        return $this->subject;
    }

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }
}