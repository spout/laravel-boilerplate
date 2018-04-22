<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoriesDataTable;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;

class CategoriesController extends AdminController
{
    public static $model = Category::class;
    public static $requestClass = CategoryFormRequest::class;
    public static $dataTableClass = CategoriesDataTable::class;
    public static $resourcePrefix = 'admin.categories';
}