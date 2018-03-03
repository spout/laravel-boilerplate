<?php

namespace App\Models;

use App\Scopes\OrderScope;

class FormField extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $casts = [
        'options' => 'array',
        'list' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderScope('sort'));
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}