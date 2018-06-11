<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Neighborhood extends Model
{
    use TranslatableTrait;

    public $timestamps = false;
    protected $guarded = [];
    public static $translatableColumns = ['name'];

    public static function verboseName()
    {
        return _i("neighborhood");
    }

    public static function verboseNamePlural()
    {
        return _i("neighborhoods");
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}