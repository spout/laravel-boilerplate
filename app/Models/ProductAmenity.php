<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductAmenity extends Pivot
{
    use TranslatableTrait;

    public $timestamps = false;
    public static $translatableColumns = ['name'];
    public $guarded = ['amenities'];
}