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
    protected $casts = [
        'value' => 'array',
    ];

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }
}