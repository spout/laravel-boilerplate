<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Accordion extends Model
{
    use TranslatableTrait;

    protected $guarded = [];
    public $timestamps = false;
    public static $translatableColumns = ['title'];

    public function accordionItems()
    {
        return $this->hasMany(AccordionItem::class);
    }

    public function __toString()
    {
        return $this->title;
    }
}
