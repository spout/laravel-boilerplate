<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SnippetsDataTable;
use App\Http\Requests\SnippetFormRequest;
use App\Models\Snippet;

class SnippetsController extends AdminController
{
    protected static $model = Snippet::class;
    protected static $requestClass = SnippetFormRequest::class;
    protected static $dataTableClass = SnippetsDataTable::class;
}