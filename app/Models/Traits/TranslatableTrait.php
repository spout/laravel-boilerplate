<?php
namespace App\Models\Traits;

use App;
use Config;

trait TranslatableTrait
{
    protected static $locale;
    protected static $fallbackLocale;

    public static function bootTranslatableTrait()
    {
        static::$locale = App::getLocale();
        static::$fallbackLocale = Config::get('app.fallback_locale');
    }

    public function getAttribute($key)
    {
        $suffix = '_' . static::$locale;

        if (!ends_with($key, $suffix) && in_array($key, static::$translatableFields)) {
            $attribute = parent::getAttribute($key . $suffix);
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
}