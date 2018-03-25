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

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderScope('sort'));
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function getTitleAttribute($value)
    {
        if (empty($value) && !empty($this->model_class) && !empty($this->foreign_key)) {
            $row = $this->findAssociatedModel($this->model_class, $this->foreign_key);
            return $row->__toString();
        }

        return $value;
    }

    public function getAssociatedUrlAttribute($value)
    {
        if (!empty($this->model_class) && !empty($this->foreign_key)) {
            $row = $this->findAssociatedModel($this->model_class, $this->foreign_key);
            if (!empty($row)) {
                $value = $row->absoluteUrl;
            }
        } elseif (!empty($this->route)) {
            $route = json_decode($this->route, true);
            $value = route($route['name'], empty($route['parameters']) ? [] : $route['parameters']);
        }

        return $value;
    }

    public function findAssociatedModel($modelClass, $foreignKey)
    {
        $cacheKey = __CLASS__ . $modelClass . $foreignKey;
        $cacheMinutes = 60;
        $modelClass = $this->model_class;
        $foreignKey = $this->foreign_key;
        return \Cache::remember($cacheKey, $cacheMinutes, function () use ($modelClass, $foreignKey) {
            return $modelClass::find($foreignKey);
        });
    }

    public function getAttributesToArrayAttribute($value)
    {
        return json_decode($this->getAttribute('attributes'), true);
    }
}
