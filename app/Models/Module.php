<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Module extends Model
{
    use TranslatableTrait;

    public $incrementing = false;
    public static $translatableColumns = ['title'];
    protected $primaryKey = 'slug';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}