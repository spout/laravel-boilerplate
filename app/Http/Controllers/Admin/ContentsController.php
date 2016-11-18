<?php
namespace App\Http\Controllers\Admin;

use App\Models\Content;
use App\Http\Controllers\Traits\DatatablesTrait;

class ContentsController extends AdminController
{
    use DatatablesTrait;

    protected static $model = Content::class;
    protected static $resourcePrefix = 'admin.contents';
}