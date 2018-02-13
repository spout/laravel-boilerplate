<?php

namespace App\DataTables;

use App\Models\Product;

class ProductsDataTable extends DataTable
{
    protected static $model = Product::class;
    protected static $resourcePrefix = 'admin.products';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
        ];
    }
}
