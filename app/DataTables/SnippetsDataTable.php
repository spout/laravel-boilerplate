<?php

namespace App\DataTables;

class SnippetsDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'slug', 'name' => 'slug', 'title' => _i("Slug")],
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
            ['data' => 'component', 'name' => 'component', 'title' => _i("Component")],
        ];
    }
}
