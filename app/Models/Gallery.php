<?php

namespace App\Models;

class Gallery extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function __toString()
    {
        return _i("Gallery %d", $this->pk);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function getShortcodeAttribute()
    {
        return '[gallery id="' . $this->id . '"]';
    }
}