<?php
namespace App\Models;

class EmailTemplate extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function __toString()
    {
        return $this->emailType['title'];
    }

    public function emailType()
    {
        return $this->hasOne(EmailType::class, 'type', 'email_type');
    }
}