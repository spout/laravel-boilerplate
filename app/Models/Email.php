<?php
namespace App\Models;

class Email extends Model
{
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function emailType()
    {
        return $this->belongsTo(EmailType::class, 'type', 'email_type');
    }
}