<?php

namespace App\DataTables;

class TemplatesDataTable extends DataTable
{
    protected static $actionColumnActions = ['edit', 'duplicate', 'delete'];

    protected function getColumns()
    {
        return [
            ['data' => 'slug', 'name' => 'slug', 'title' => _i("Slug")],
            ['data' => 'template_file', 'name' => 'view', 'title' => _i("Template file")],
        ];
    }
}
