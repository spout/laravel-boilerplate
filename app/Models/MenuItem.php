<?php

namespace App\Models;

use App\Models\Traits\AdjacencyListTrait;
use App\Models\Traits\TranslatableTrait;
use App\Scopes\OrderScope;

class MenuItem extends Model
{
    use TranslatableTrait;
    use AdjacencyListTrait;

    public $timestamps = false;
    protected $guarded = [];

    public static $translatableColumns = [
        'title',
        'url',
        'content',
    ];

    public static function verboseName()
    {
        return _i("menu item");
    }

    public static function verboseNamePlural()
    {
        return _i("menu items");
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderScope('sort'));
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function menuItemable()
    {
        return $this->morphTo();
    }

    public function getTitleAttribute($value)
    {
        if (empty($value) && !empty($this->menu_itemable_type) && !empty($this->menu_itemable_id)) {
            return $this->menuItemable->__toString();
        }

        return $value;
    }

    public function getAssociatedUrlAttribute($value)
    {
        if (!empty($this->menu_itemable_type) && !empty($this->menu_itemable_id)) {
            if (!empty($this->menuItemable)) {
                return $this->menuItemable->absoluteUrl;
            }
        } elseif (!empty($this->route)) {
            $route = json_decode($this->route, true);
            return route($route['name'], empty($route['parameters']) ? [] : $route['parameters']);
        }

        return $value;
    }

    public function getAttributesToArrayAttribute($value)
    {
        return json_decode($this->getAttribute('attributes'), true);
    }
}
