<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class AccordionItem extends Model
{
    use TranslatableTrait;

    protected $guarded = [];
    public $timestamps = false;
    public static $translatableColumns = ['title', 'content'];

    public static function verboseName()
    {
        return _i("accordion item");
    }

    public static function verboseNamePlural()
    {
        return _i("accordion items");
    }

    public function accordion()
    {
        return $this->belongsTo(Accordion::class);
    }

    public function __toString()
    {
        return $this->title;
    }
}