<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CurrenciesDataTable;
use App\Http\Requests\CurrencyFormRequest;
use App\Models\Currency;

class CurrenciesController extends AdminController
{
    public static $model = Currency::class;
    public static $requestClass = CurrencyFormRequest::class;
    public static $dataTableClass = CurrenciesDataTable::class;
    public static $resourcePrefix = 'admin.currencies';
}