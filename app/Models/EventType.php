<?php

namespace App\Models;

use App\Scopes\OrderScope;

class EventType extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'type';
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderScope('title'));
    }

    public function eventTemplate()
    {
        return $this->hasOne(EventTemplate::class, 'event_type', 'type');
    }
}