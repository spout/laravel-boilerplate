<?php

namespace App\Models;

class Site extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'slug';
    protected $fillable = [
        'domain',
        'name',
    ];
}