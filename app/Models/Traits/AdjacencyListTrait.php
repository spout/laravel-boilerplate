<?php
namespace App\Models\Traits;

/**
 * Class AdjacencyListTrait
 * @link http://stackoverflow.com/a/24679043/1656355
 * @package App\Models\Traits
 */
trait AdjacencyListTrait
{
    public static $parentColumn = 'parent_id';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(self::class, static::$parentColumn);
    }

    /**
     * @return mixed
     */
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }

    /**
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(self::class, static::$parentColumn);
    }

    /**
     * @return mixed
     */
    public function parentRecursive()
    {
        return $this->parent()->with('parentRecursive');
    }
}