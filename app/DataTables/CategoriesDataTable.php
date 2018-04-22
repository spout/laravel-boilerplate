<?php

namespace App\DataTables;

class CategoriesDataTable extends DataTable
{
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
