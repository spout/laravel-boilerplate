<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\NeighborhoodsDataTable;
use App\Http\Requests\NeighborhoodFormRequest;
use App\Models\Neighborhood;

class NeighborhoodsController extends AdminController
{
    public static $model = Neighborhood::class;
    public static $requestClass = NeighborhoodFormRequest::class;
    public static $dataTableClass = NeighborhoodsDataTable::class;
    public static $resourcePrefix = 'admin.neighborhoods';
}