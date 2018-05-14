<?php

namespace App\Models\Traits;

trait CommonTrait
{
    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    public static function verboseName()
    {
        return class_basename(static::class);
    }

    public static function verboseNamePlural()
    {
        return str_plural(static::verboseName());
    }

    /**
     * Common primaryKey accessor
     *
     * @return mixed
     */
    public function getPkAttribute()
    {
        return $this->{$this->primaryKey};
    }

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }

    public function getAbsoluteLocalizedUrl($lang)
    {
        return \LaravelLocalization::getLocalizedURL($lang, $this->absolute_url);
    }
}