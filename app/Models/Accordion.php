<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Accordion extends Model
{
    use TranslatableTrait;

    protected $guarded = ['items'];
    public $timestamps = false;
    public static $translatableColumns = ['title'];

    public static function verboseName()
    {
        return _i("accordion");
    }

    public static function verboseNamePlural()
    {
        return _i("accordions");
    }

    public function accordionItems()
    {
        return $this->hasMany(AccordionItem::class);
    }

    public function __toString()
    {
        return $this->title;
    }
}
