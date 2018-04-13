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

    public static function verboseName()
    {
        return _i("setting");
    }

    public static function verboseNamePlural()
    {
        return _i("settings");
    }

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