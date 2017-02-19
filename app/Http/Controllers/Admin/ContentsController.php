<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\ContentsDataTable;
use App\Models\Content;

class ContentsController extends AdminController
{
    protected static $model = Content::class;
    protected static $dataTableClass = ContentsDataTable::class;
}