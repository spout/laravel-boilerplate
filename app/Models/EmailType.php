<?php
namespace App\Models;

use App\Scopes\OrderScope;

class EmailType extends Model
{
    const NOT_AVAILABLE = 'not-available';

    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'type';
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderScope('title'));
    }

    public function emailTemplate()
    {
        return $this->hasOne(EmailTemplate::class, 'email_type', 'type');
    }

    public function emails()
    {
        return $this->hasMany(Email::class, 'email_type', 'type');
    }
}