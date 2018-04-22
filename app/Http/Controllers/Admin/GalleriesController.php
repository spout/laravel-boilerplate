<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\GalleriesDataTable;
use App\Http\Requests\GalleryFormRequest;
use App\Models\Gallery;

class GalleriesController extends AdminController
{
    public static $model = Gallery::class;
    public static $requestClass = GalleryFormRequest::class;
    public static $dataTableClass = GalleriesDataTable::class;
    public static $resourcePrefix = 'admin.galleries';
}