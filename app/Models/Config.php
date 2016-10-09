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
    protected $rules = [
        'key' => 'required|max:255',
        'value' => 'required',
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