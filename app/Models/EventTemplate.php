<?php
namespace App\Models;

class EventTemplate extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function eventType()
    {
        return $this->hasOne(EventType::class, 'type', 'event_type');
    }
}