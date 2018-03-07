<?php

namespace App\Models;

use App\Scopes\OrderScope;

class FormField extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $casts = [
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

    public function getNameAttribute()
    {
        return $field['label'] ?? "field-{$this->form_id}-{$this->pk}";
    }
}