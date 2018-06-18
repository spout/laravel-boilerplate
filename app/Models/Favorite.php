<?php

namespace App\Models;

class Favorite extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    public static function verboseName()
    {
        return _i("favorite");
    }

    public static function verboseNamePlural()
    {
        return _i("favorites");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favoritable()
    {
        return $this->morphTo();
    }
}