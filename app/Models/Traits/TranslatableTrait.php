<?php

namespace App\Models\Traits;

trait TranslatableTrait
{
    protected static $locale;
    protected static $localeSuffix;
    protected static $localeFallback;
    protected static $localeFallbackSuffix;

    public static function bootTranslatableTrait()
    {
        static::$locale = \LaravelLocalization::getCurrentLocale();
        static::$localeSuffix = '_' . static::$locale;
        static::$localeFallback = config('app.fallback_locale');
        static::$localeFallbackSuffix = '_' . static::$localeFallback;

        static::retrieved(function ($model) {
            /** @var \Illuminate\Database\Eloquent\Model $model */
            foreach (static::$translatableColumns as $column) {
                $model->append($column);

                foreach (config('app.locales') as $lang => $locale) {
                    $model->append("{$column}_{$lang}");
                }
            }
        });
    }

    public function __call($method, $parameters)
    {
        foreach (static::$translatableColumns as $column) {
            if ($method === camel_case("get_{$column}_attribute")) {
                return $this->getAttribute($column);
            }

            foreach (config('app.locales') as $lang => $locale) {
                if ($method === camel_case("get_{$column}_{$lang}_attribute")) {
                    return $this->getAttribute("{$column}_{$lang}");
                }
            }
        }

        return parent::__call($method, $parameters);
    }

    public function getAttribute($key)
    {
        if (in_array($key, static::$translatableColumns)) {
            // current locale
            $attribute = parent::getAttribute($key . static::$localeSuffix);

            // fallback locale
            if (empty($attribute)) {
                $attribute = parent::getAttribute($key . static::$localeFallbackSuffix);
            }
        }

        // default attribute
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