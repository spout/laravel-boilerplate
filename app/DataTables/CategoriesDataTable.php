<?php

namespace App\DataTables;

use App\Models\Category;

class CategoriesDataTable extends DataTable
{
    protected static $model = Category::class;
    protected static $resourcePrefix = 'admin.categories';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'title' => __("ID")],
            ['data' => 'title', 'title' => __("Title")],
        ];
    }
}