<?php
namespace App\Models;

class MenuItem extends Model
{
    protected $fillable = [
        'model',
        'foreign_key',
        'url',
        'route',
        'attributes',
        'title',
        'sort',
    ];

    //protected $rules = [
    //    'title' => 'required|max:255',
    //    'slug' => 'required',
    //];

    public function __toString()
    {
        return $this->title;
    }

    public function getAbsoluteUrlAttribute()
    {
        return '#';
    }

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }
}