<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServicesDataTable;
use App\Http\Requests\ServiceFormRequest;
use App\Models\Service;

class ServicesController extends AdminController
{
    public static $model = Service::class;
    public static $requestClass = ServiceFormRequest::class;
    public static $dataTableClass = ServicesDataTable::class;
    public static $resourcePrefix = 'admin.services';
}