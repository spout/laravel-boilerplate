<?php

namespace App\Models;

use App\Scopes\OrderScope;

class EventType extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderScope('title'));
    }
}