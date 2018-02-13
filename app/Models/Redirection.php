<?php

namespace App\Models;

class Redirection extends Model
{
    protected $fillable = [
        'domain',
        'url',
        'destination',
    ];
}