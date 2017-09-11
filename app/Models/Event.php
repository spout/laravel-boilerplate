<?php
namespace App\Models;

class Event extends Model
{
    protected $guarded = [];
    protected $dates = [
        'start',
        'end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function eventType()
    {
        return $this->belongsTo(EventType::class, 'type', 'event_type');
    }
}