<?php
namespace App\Models;

class Event extends Model
{
    public $incrementing = false;

    protected $guarded = [];
    protected $dates = [
        'start',
        'end',
        'created_at',
        'updated_at',
    ];

    public function eventType()
    {
        return $this->belongsTo(EventType::class, 'type', 'event_type');
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}