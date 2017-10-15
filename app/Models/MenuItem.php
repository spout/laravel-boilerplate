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
        if (empty($value) && !empty($this->model) && !empty($this->foreign_key)) {
            $modelClass = $this->model;
            $row = $modelClass::find($this->foreign_key);
            return $row; // __toString
        }

        return $value;
    }

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }
}
