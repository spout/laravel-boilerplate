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