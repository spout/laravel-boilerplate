<?php
namespace App\Models;

class Config extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'key';
    protected $fillable = [
        'key',
        'value',
    ];

    public function __toString()
    {
        return $this->key;
    }

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }
}