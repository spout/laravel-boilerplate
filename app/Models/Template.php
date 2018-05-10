<?php

namespace App\Models;

class Template extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'slug';
    protected $guarded = [];

    public static function verboseName()
    {
        return _i("template");
    }

    public static function verboseNamePlural()
    {
        return _i("templates");
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class)
            ->using(ModuleTemplate::class)
            ->withPivot('sort')
            ->orderBy('pivot_sort');
    }
}