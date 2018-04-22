<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PricesDataTable;
use App\Http\Requests\PriceFormRequest;
use App\Models\Price;

class PricesController extends AdminController
{
    public static $model = Price::class;
    public static $requestClass = PriceFormRequest::class;
    public static $dataTableClass = PricesDataTable::class;
}