<?php

namespace App\Models;

class Email extends Model
{
    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [];

    public function __toString()
    {
        return $this->subject;
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function emailType()
    {
        return $this->belongsTo(EmailType::class, 'email_type', 'type');
    }
}