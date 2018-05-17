<?php

namespace App\Models\Traits;

trait PlaceholdableTrait
{
    public function placeholder()
    {
        return $this->belongsTo(\App\Models\Placeholder::class);
    }
}