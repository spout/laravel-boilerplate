<?php
namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Content extends Model
{
    use TranslatableTrait;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $translatableFields = [
        'title',
        'slug',
        'path',
        'content',
    ];

    public function __toString()
    {
        return $this->title;
    }

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }

    public static function bulkActive($bulk)
    {
        return self::whereIn('id', $bulk)->update(['active' => true]);
    }
}