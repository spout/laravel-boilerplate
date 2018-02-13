<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PricesDataTable;
use App\Http\Requests\PriceFormRequest;
use App\Models\Price;

class PricesController extends AdminController
{
    protected static $model = Price::class;
    protected static $requestClass = PriceFormRequest::class;
    protected static $dataTableClass = PricesDataTable::class;
}