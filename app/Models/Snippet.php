<?php
namespace App\Models;

use App\Models\Traits\TranslatableTrait;

class Snippet extends Model
{
    use TranslatableTrait;

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'slug';

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    public static $translatableColumns = [
        'title',
        'content',
    ];
}