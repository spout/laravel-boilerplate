<?php
namespace App\Models;

use App\Models\Traits\AdjacencyListTrait;

class MenuItem extends Model
{
    use AdjacencyListTrait;

    public $timestamps = false;
    protected $guarded = [];

    public function getTitleAttribute($value)
    {
        if (!empty($this->model) && !empty($this->foreign_key)) {
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

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}