<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RedirectionsDataTable;
use App\Http\Requests\RedirectionFormRequest;
use App\Models\Redirection;

class RedirectionsController extends AdminController
{
    public static $model = Redirection::class;
    public static $requestClass = RedirectionFormRequest::class;
    public static $dataTableClass = RedirectionsDataTable::class;
}