<?php
namespace App\Models;

use Carbon\Carbon;

class Booking extends Model
{
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