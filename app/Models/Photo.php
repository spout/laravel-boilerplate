<?php

namespace App\Models;

use App\Scopes\OrderScope;

class Photo extends Model
{
    public $timestamps = false;

    protected $guarded = [];
    protected $appends = [
        'tmb',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderScope('sort'));
    }

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function getTmbAttribute()
    {
        return route('imagecache', ['template' => 'elfinder', 'filename' => $this->path]);
    }
}