<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AmenitiesDataTable;
use App\Http\Requests\AmenityFormRequest;
use App\Models\Amenity;

class AmenitiesController extends AdminController
{
    public static $model = Amenity::class;
    public static $requestClass = AmenityFormRequest::class;
    public static $dataTableClass = AmenitiesDataTable::class;
    public static $resourcePrefix = 'admin.amenities';
}