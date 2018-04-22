<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContentsDataTable;
use App\Http\Requests\ContentFormRequest;
use App\Models\Content;

class ContentsController extends AdminController
{
    public static $model = Content::class;
    public static $requestClass = ContentFormRequest::class;
    public static $dataTableClass = ContentsDataTable::class;
}