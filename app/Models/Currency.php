<?php

namespace App\Models;

use App\Scopes\ActiveScope;

class Currency extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'code';

    public static function verboseName()
    {
        return _i("currency");
    }

    public static function verboseNamePlural()
    {
        return _i("currencies");
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new ActiveScope());
    }

    public function __toString()
    {
        return $this->pk;
    }
}