<?php

namespace App\Models;

class Redirection extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'domain',
        'url',
        'destination',
    ];

    public static function verboseName()
    {
        return _i("redirection");
    }

    public static function verboseNamePlural()
    {
        return _i("redirections");
    }

    public function __toString()
    {
        return "{$this->domain}{$this->url} => {$this->destination}";
    }
}