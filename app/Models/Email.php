<?php
namespace App\Models;

class Email extends Model
{
    protected $guarded = [];

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
        return $this->belongsTo(EmailType::class, 'type', 'email_type');
    }
}