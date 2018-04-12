<?php

namespace App\Models\Traits;

trait CommonTrait
{
    public function __toString()
    {
        return $this->title;
    }

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
}