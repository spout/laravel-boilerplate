<?php

namespace App\Models;

use App\Scopes\ActiveScope;

class Currency extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'code';

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