<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CurrenciesDataTable;
use App\Http\Requests\CurrencyFormRequest;
use App\Models\Currency;

class CurrenciesController extends AdminController
{
    protected static $model = Currency::class;
    protected static $requestClass = CurrencyFormRequest::class;
    protected static $dataTableClass = CurrenciesDataTable::class;
}