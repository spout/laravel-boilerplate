<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;
use App\Models\Traits\AdjacencyListTrait;

class Content extends Model
{
    use TranslatableTrait;
    use AdjacencyListTrait;

    protected $dates = ['created_at', 'updated_at'];
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public static $translatableColumns = [
        'title',
        'path',
        'content',
    ];

    public static function verboseName()
    {
        return _i("content");
    }

    public static function verboseNamePlural()
    {
        return _i("contents");
    }

    public function getAbsoluteUrlAttribute()
    {
        if ($this->path === 'homepage') {
            return route('homepage');
        }
        return route('contents.show', ['path' => $this->path]);
    }

    public static function bulkActive($bulk)
    {
        return static::whereIn('id', $bulk)->update(['active' => true]);
    }
}