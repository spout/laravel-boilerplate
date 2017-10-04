<?php
namespace App\Models;

class Setting extends Model
{
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'key';
    protected $fillable = [
        'key',
        'value',
    ];

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }

    public function getValueAsArrayAttribute()
    {
        return json_decode($this->value, true);
    }
}