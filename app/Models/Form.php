<?php

namespace App\Models;

class Form extends Model
{
    protected $guarded = [];

    public static function verboseName()
    {
        return _i("form");
    }

    public static function verboseNamePlural()
    {
        return _i("forms");
    }

    public function fields()
    {
        return $this->hasMany(FormField::class);
    }

    public function datas()
    {
        return $this->hasMany(FormData::class);
    }

    public function getShortcodeAttribute()
    {
        return '[form id="' . $this->id . '"]';
    }
}