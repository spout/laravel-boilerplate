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
        return $this->hasMany(static::class, static::$parentColumn);
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
        return $this->belongsTo(static::class, static::$parentColumn);
    }

    /**
     * @return mixed
     */
    public function parentRecursive()
    {
        return $this->parent()->with('parentRecursive');
    }

    /**
     * @link https://stackoverflow.com/a/29972187/1656355
     * @return mixed
     */
    public function ancestors()
    {
        $ancestors = $this->where('id', '=', $this->parent_id)->get();

        while ($ancestors->last() && $ancestors->last()->parent_id !== null) {
            $parent = $this->where('id', '=', $ancestors->last()->parent_id)->get();
            $ancestors = $ancestors->merge($parent);
        }

        return $ancestors;
    }

    public function getAncestorsAttribute()
    {
        return $this->ancestors();
        // or like this, if you want it the other way around
        // return $this->ancestors()->reverse();
    }
}