<?php

namespace App\Models;

use App\Scopes\OrderScope;

class EventType extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public static function verboseName()
    {
        return _i("event type");
    }

    public static function verboseNamePlural()
    {
        return _i("event types");
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderScope('title'));
    }
}