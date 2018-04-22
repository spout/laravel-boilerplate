<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SitesDataTable;
use App\Http\Requests\SiteFormRequest;
use App\Models\Site;

class SitesController extends AdminController
{
    public static $model = Site::class;
    public static $requestClass = SiteFormRequest::class;
    public static $dataTableClass = SitesDataTable::class;
    public static $resourcePrefix = 'admin.sites';
}