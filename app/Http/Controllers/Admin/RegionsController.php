<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\RegionsDataTable;
use App\Http\Requests\RegionFormRequest;
use App\Models\Region;

class RegionsController extends AdminController
{
    public static $model = Region::class;
    public static $requestClass = RegionFormRequest::class;
    public static $dataTableClass = RegionsDataTable::class;
    public static $resourcePrefix = 'admin.regions';
}