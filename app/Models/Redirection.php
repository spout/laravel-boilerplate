<?php

namespace App\Models;

class Redirection extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'domain',
        'url',
        'destination',
    ];

    public function __toString()
    {
        return "{$this->domain}{$this->url} => {$this->destination}";
    }
}