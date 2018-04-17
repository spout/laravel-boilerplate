<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;
use App\Scopes\OrderScope;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Country extends Model
{
    use TranslatableTrait;

    public $timestamps = false;
    protected $primaryKey = 'code';
    protected $guarded = [];
    public static $translatableColumns = ['name'];

    public static function verboseName()
    {
        return _i("country");
    }

    public static function verboseNamePlural()
    {
        return _i("countries");
    }

    protected static function boot()
    {
        parent::boot();

        $locale = LaravelLocalization::getCurrentLocale();

        static::addGlobalScope(new OrderScope("name_{$locale}"));
    }
}