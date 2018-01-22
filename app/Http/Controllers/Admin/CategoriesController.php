<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoriesDataTable;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;

class CategoriesController extends AdminController
{
    protected static $model = Category::class;
    protected static $requestClass = CategoryFormRequest::class;
    protected static $dataTableClass = CategoriesDataTable::class;
}