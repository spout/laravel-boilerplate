<?php

namespace App\Models;

use App\Scopes\OrderScope;

class Event extends Model
{
    protected $guarded = [];
    protected $dates = ['date_start', 'date_end', 'created_at', 'updated_at'];

    public static function verboseName()
    {
        return _i("event");
    }

    public static function verboseNamePlural()
    {
        return _i("events");
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderScope('date_start'));
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }
}