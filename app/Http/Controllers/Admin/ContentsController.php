<?php
namespace App\Http\Controllers\Admin;

use App\Models\Content;

class ContentsController extends AdminController
{
    public $model = Content::class;
}