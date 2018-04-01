<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;
use App\Scopes\OrderScope;

class FormField extends Model
{
    use TranslatableTrait;

    public $timestamps = false;
    protected $guarded = [];
    protected $casts = [
        'list' => 'array',
    ];

    public static $translatableColumns = [
        'label'
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
