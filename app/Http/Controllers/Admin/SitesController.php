<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SitesDataTable;
use App\Http\Requests\SiteFormRequest;
use App\Models\Site;

class SitesController extends AdminController
{
    protected static $model = Site::class;
    protected static $requestClass = SiteFormRequest::class;
    protected static $dataTableClass = SitesDataTable::class;
}