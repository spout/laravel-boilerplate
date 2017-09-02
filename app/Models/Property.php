<?php
namespace App\Models;

use Sabre\VObject;

class Property extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    public function __toString()
    {
        return $this->name;
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getIcalUrlAsObjectAttribute()
    {
        ini_set('user_agent', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36');
        return VObject\Reader::read(
            fopen($this->ical_url, 'r')
        );
    }
}