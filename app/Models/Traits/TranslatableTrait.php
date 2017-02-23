<?php
namespace App\Models\Traits;

use App;
use Config;

trait TranslatableTrait
{
    protected static $locale;
    protected static $localeSuffix;
    protected static $localeFallback;

    public static function bootTranslatableTrait()
    {
        static::$locale = App::getLocale();
        static::$localeSuffix = '_' . static::$locale;
        static::$localeFallback = Config::get('app.fallback_locale');
    }

    public function getAttribute($key)
    {
        if (!ends_with($key, static::$localeSuffix) && in_array($key, static::$translatableFields)) {
            $attribute = parent::getAttribute($key . static::$localeSuffix);
        }

        if (empty($attribute)) {
            $attribute = parent::getAttribute($key);
        }

        return $attribute;
    }

    //public function setAttribute($key, $value)
    //{
    //    parent::setAttribute($key, $value);
    //}

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