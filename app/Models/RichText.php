<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class RichText extends Model
{
    use TranslatableTrait;

    public $timestamps = false;
    protected $guarded = [];
    public static $translatableColumns = ['content'];

    public static function verboseName()
    {
        return _i("rich text");
    }

    public static function verboseNamePlural()
    {
        return _i("rich texts");
    }
}