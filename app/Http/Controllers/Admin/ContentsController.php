<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\DatatablesTrait;
use App\Models\Content;

class ContentsController extends AdminController
{
    use DatatablesTrait;

    protected static $model = Content::class;
    protected static $resourcePrefix = 'admin.contents';
}