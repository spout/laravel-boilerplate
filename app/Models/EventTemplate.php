<?php
namespace App\Models;

//use App\Scopes\OrderScope;

class EventTemplate extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'type';
    protected $guarded = [];

    //protected static function boot()
    //{
    //    parent::boot();
    //
    //    static::addGlobalScope(new OrderScope('title'));
    //}
}