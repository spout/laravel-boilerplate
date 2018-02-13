<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RedirectionsDataTable;
use App\Http\Requests\RedirectionFormRequest;
use App\Models\Redirection;

class RedirectionsController extends AdminController
{
    protected static $model = Redirection::class;
    protected static $requestClass = RedirectionFormRequest::class;
    protected static $dataTableClass = RedirectionsDataTable::class;
}