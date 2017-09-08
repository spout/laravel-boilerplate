<?php
namespace App\Models;

class Booking extends Model
{
    protected $dates = ['arrival_date', 'departure_date'];
    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }
}