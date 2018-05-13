<?php

namespace App\Models;

use App\Models\Traits\TranslatableTrait;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Placeholder extends Pivot
{
    use TranslatableTrait;

    public $timestamps = false;
    protected $table = 'placeholders';
    public static $translatableColumns = ['title'];
}