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
            ['data' => 'title_plural', 'name' => 'title_plural', 'title' => _i("Title plural")],
            ['data' => 'slug_plural', 'name' => 'slug_plural', 'title' => _i("Slug plural")],
            ['data' => 'title_singular', 'name' => 'title_singular', 'title' => _i("Title singular")],
            ['data' => 'slug_singular', 'name' => 'slug_singular', 'title' => _i("Slug singular")],
        ];
    }
}
