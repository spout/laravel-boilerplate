<?php

namespace App\DataTables;

class ProductsDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
        ];
    }
}
