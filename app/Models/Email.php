<?php
namespace App\Models;

class Email extends Model
{
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}