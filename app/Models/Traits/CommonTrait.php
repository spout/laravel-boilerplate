<?php
namespace App\Models\Traits;

trait CommonTrait
{
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