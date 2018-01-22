<?php

namespace App\Models;

use Sabre\VObject;

class Property extends Model
{
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'custom_fields' => 'array',
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

    public function getCustomFieldsHtmlAttribute()
    {
        $output = '';
        if (!empty($this->custom_fields)) {
            $output = '<dl>';
            foreach ($this->custom_fields as $customField) {
                $output .= '<dt>' . e($customField['name']) . '</dt>';
                $output .= '<dd>' . nl2br(e($customField['value'])) . '</dd>';
            }
            $output .= '</dl>';
        }
        return $output;
    }

    public function getCustomFieldsTextAttribute()
    {
        $output = '';
        if (!empty($this->custom_fields)) {
            foreach ($this->custom_fields as $customField) {
                $output .= "{$customField['name']} :" . PHP_EOL;
                $output .= $customField['value'] . PHP_EOL;
            }
        }
        return $output;
    }
}