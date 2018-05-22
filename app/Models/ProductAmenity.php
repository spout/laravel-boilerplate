<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductAmenity extends Pivot
{
    public $timestamps = false;
    public $guarded = ['amenities'];

    public function amenity()
    {
        return $this->hasOne(Amenity::class, 'id', 'amenity_id');
    }
}