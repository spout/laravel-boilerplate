<?php

namespace App\Models;

class Modulable extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function module()
    {
        return $this->hasOne($this->modulable_type, 'id', 'modulable_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function placeholder()
    {
        return $this->belongsTo(Placeholder::class);
    }
}