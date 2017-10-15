<?php
namespace App\Models\Traits;

use Config;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

trait TranslatableTrait
{
    protected static $locale;
    protected static $localeSuffix;
    protected static $localeFallback;

    public static function bootTranslatableTrait()
    {
        static::$locale = LaravelLocalization::getCurrentLocale();
        static::$localeSuffix = '_' . static::$locale;
        static::$localeFallback = Config::get('app.fallback_locale');
    }

    public function getAttribute($key)
    {
        if (!ends_with($key, static::$localeSuffix) && in_array($key, static::$translatableColumns)) {
            $attribute = parent::getAttribute($key . static::$localeSuffix);
        }

        if (empty($attribute)) {
            $attribute = parent::getAttribute($key);
        }

        return $attribute;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $column
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLocale($query, $column, $value)
    {
        return $query->where($column . static::$localeSuffix, $value);
    }
}