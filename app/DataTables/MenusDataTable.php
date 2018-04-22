<?php

namespace App\DataTables;

class MenusDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
            ['data' => 'slug', 'name' => 'slug', 'title' => _i("Slug")],
        ];
    }
}
