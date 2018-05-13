<?php

namespace App\Models;

class Template extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'slug';
    protected $guarded = ['placeholders'];

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
        return $this->belongsToMany(Module::class, 'placeholders')->using(Placeholder::class)->withPivot('id', 'placeholder');
    }

    public function getTemplateContentAttribute()
    {
        if (!empty($this->template)) {
            return $this->template;
        } elseif (!empty($this->template_file)) {
            return file_get_contents(resource_path("views/templates/{$object->template_file}.blade.php"));
        }

        return null;
    }

    public function getPlaceholdersAttribute()
    {
        if (preg_match_all('/\[placeholder slug="([a-zA-Z0-9-_]+)"\]/', $this->template_content, $matches)) {
            return $matches[1];
        }

        return [];
    }
}