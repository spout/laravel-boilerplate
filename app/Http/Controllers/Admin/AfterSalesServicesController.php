<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\AfterSalesServicesDataTable;
use App\Http\Requests\AfterSalesServiceFormRequest;
use App\Models\AfterSalesService;

class AfterSalesServicesController extends AdminController
{
    protected static $model = AfterSalesService::class;
    protected static $requestClass = AfterSalesServiceFormRequest::class;
    protected static $dataTableClass = AfterSalesServicesDataTable::class;
}