<?php

namespace App\Models;

class FormData extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];
    protected $casts = [
        'data' => 'array',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function __toString()
    {
        return json_encode($this->data, JSON_PRETTY_PRINT);
    }
}