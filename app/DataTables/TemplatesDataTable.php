<?php

namespace App\DataTables;

class TemplatesDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'slug', 'name' => 'slug', 'title' => _i("Slug")],
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
            ['data' => 'template_file', 'name' => 'view', 'title' => _i("Template file")],
        ];
    }
}
