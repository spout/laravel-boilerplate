<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\ContentsDataTable;
use App\Http\Requests\ContentFormRequest;
use App\Models\Content;

class ContentsController extends AdminController
{
    protected static $model = Content::class;
    protected static $requestClass = ContentFormRequest::class;
    protected static $dataTableClass = ContentsDataTable::class;
}