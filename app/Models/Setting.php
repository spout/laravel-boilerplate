<?php

namespace App\Models;

class Setting extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'key';
    protected $fillable = [
        'key',
        'value',
    ];

    public function __toString()
    {
        return $this->value;
    }

    public function getValueToArrayAttribute()
    {
        /**
         * I don't use built-in JSON casting because value form input is a raw JSON string.
         */
        return json_decode($this->value, true);
    }
}