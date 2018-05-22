<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductService extends Pivot
{
    public $timestamps = false;
    public $guarded = ['services'];

    public function service()
    {
        return $this->hasOne(Service::class, 'id', 'service_id');
    }
}