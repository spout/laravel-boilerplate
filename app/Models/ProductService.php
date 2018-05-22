<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductService extends Pivot
{
    public $timestamps = false;
    public $guarded = ['services'];
}