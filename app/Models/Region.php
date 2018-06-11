<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Region extends Model
{
    use TranslatableTrait;

    public $timestamps = false;
    protected $guarded = [];
    public static $translatableColumns = ['name'];

    public static function verboseName()
    {
        return _i("region");
    }

    public static function verboseNamePlural()
    {
        return _i("regions");
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}