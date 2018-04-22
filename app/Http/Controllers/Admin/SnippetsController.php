<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SnippetsDataTable;
use App\Http\Requests\SnippetFormRequest;
use App\Models\Snippet;

class SnippetsController extends AdminController
{
    public static $model = Snippet::class;
    public static $requestClass = SnippetFormRequest::class;
    public static $dataTableClass = SnippetsDataTable::class;
}