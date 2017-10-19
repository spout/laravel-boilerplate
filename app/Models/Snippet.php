<?php
namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Snippet extends Model
{
    use TranslatableTrait;

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'slug';
    protected $guarded = [];

    public static $translatableColumns = [
        'title',
        'content',
    ];
}