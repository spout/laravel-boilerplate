<?php

namespace App\Models\Traits;

use App\Libraries\TreeCollection;

/**
 * Class AdjacencyListTrait
 * @link http://stackoverflow.com/a/24679043/1656355
 * @package App\Models\Traits
 */
trait AdjacencyListTrait
{
    public static $parentColumn = 'parent_id';
    protected $subtree;

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
        $ancestors = $this->where('id', '=', $this->{static::$parentColumn})->get();

        while ($ancestors->last() && $ancestors->last()->{static::$parentColumn} !== null) {
            $parent = $this->where('id', '=', $ancestors->last()->{static::$parentColumn})->get();
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

    /**
     * @link https://laracasts.com/discuss/channels/general-discussion/eloquent-infinite-children-into-usable-array-and-render-it-to-nested-ul/replies/34455
     * @return TreeCollection
     */
    public function getSubtreeAttribute()
    {
        return $this->subtree = $this->subtree ?: $this->newCollection();
    }

    public function newCollection(array $models = array())
    {
        return new TreeCollection($models);
    }

    /**
     * @param TreeCollection $tree
     * @param string $key
     * @param string $column
     * @param array $list
     * @param int $level
     *
     * @return array
     */
    public static function getTreeList(TreeCollection $tree, $key = 'pk', $column = 'title', &$list = [], $level = 0)
    {
        $levelDelim = $level ? str_repeat('&nbsp;', $level * 3) . '&gt; ' : '';

        foreach ($tree as $node) {
            $keyValue = is_callable($key) ? call_user_func($key, $node) : $node->{$key};
            $columnValue = is_callable($column) ? call_user_func($column, $node) : $node->{$column};
            $list[$keyValue] = "{$levelDelim}{$columnValue}";

            if ($node->subtree instanceof TreeCollection && $node->subtree->isNotEmpty()) {
                static::getTreeList($node->subtree, $key, $column, $list, $level + 1);
            }
        }

        return $list;
    }
}