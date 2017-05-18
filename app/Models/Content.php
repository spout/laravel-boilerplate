<?php
namespace App\Models;

use App\Models\Traits\TranslatableTrait;
use App\Models\Traits\AdjacencyListTrait;

class Content extends Model
{
    use TranslatableTrait;
    use AdjacencyListTrait;

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public static $translatableColumns = [
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
        return route('contents.show', ['path' => $this->path]);
    }

    public static function bulkActive($bulk)
    {
        return self::whereIn('id', $bulk)->update(['active' => true]);
    }
}