<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDataTable;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;

class ProductsController extends AdminController
{
    protected static $model = Product::class;
    protected static $requestClass = ProductFormRequest::class;
    protected static $dataTableClass = ProductsDataTable::class;
}