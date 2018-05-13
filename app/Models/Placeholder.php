<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Placeholder extends Pivot
{
    public $timestamps = false;
    protected $table = 'placeholders';
}