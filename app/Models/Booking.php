<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $dates = ['arrival_date', 'departure_date'];
    protected $guarded = [];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFuture($query)
    {
        return $query->where('departure_date', '>=', Carbon::now());
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExpired($query)
    {
        return $query->where('departure_date', '<', Carbon::now());
    }
}