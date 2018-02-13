<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\GalleriesDataTable;
use App\Http\Requests\GalleryFormRequest;
use App\Models\Gallery;

class GalleriesController extends AdminController
{
    protected static $model = Gallery::class;
    protected static $requestClass = GalleryFormRequest::class;
    protected static $dataTableClass = GalleriesDataTable::class;
}