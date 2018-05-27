<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Criteria extends Model
{
    use TranslatableTrait;

    protected $guarded = [];
    public $timestamps = false;
    public static $translatableColumns = [
        'name',
    ];

    public static function verboseName()
    {
        return _i("criteria");
    }

    public static function verboseNamePlural()
    {
        return _i("criterias");
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