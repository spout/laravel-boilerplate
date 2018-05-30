<?php

namespace App\Models;

use App\Models\Traits\AdjacencyListTrait;
use App\Models\Traits\TranslatableTrait;

class Tag extends Model
{
    use TranslatableTrait;
    use AdjacencyListTrait;

    protected $guarded = [];
    public $timestamps = false;
    public static $translatableColumns = [
        'name',
    ];

    public static function verboseName()
    {
        return _i("tag");
    }

    public static function verboseNamePlural()
    {
        return _i("tags");
    }

    public function __toString()
    {
        return $this->name;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}