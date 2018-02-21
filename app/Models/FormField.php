<?php

namespace App\Models;

class FormField extends Model
{
    protected $guarded = [];
    protected $casts = [
        'attributes' => 'array',
        'list' => 'array',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}