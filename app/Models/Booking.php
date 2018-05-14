<?php

namespace App\Models;

class Booking extends Model
{
    protected $guarded = [];

    public static function verboseName()
    {
        return _i("booking");
    }

    public static function verboseNamePlural()
    {
        return _i("bookings");
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function __toString()
    {
        return _i("Booking of %s by %s %s", [$this->product->title, $this->firstname, $this->lastname]);
    }
}