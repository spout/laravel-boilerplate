<?php

namespace App\Observers;

use App\Models\Property;

class PropertyObserver
{
    public function saving(Property $property)
    {
        $property->custom_fields = array_filter($property->custom_fields, function ($var) {
            return !empty($var['name']) && !empty($var['value']);
        });
    }
}