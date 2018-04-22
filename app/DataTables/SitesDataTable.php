<?php

namespace App\DataTables;

class SitesDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'slug', 'name' => 'slug', 'title' => _i("Slug")],
            ['data' => 'domain', 'name' => 'domain', 'title' => _i("Domain")],
            ['data' => 'name', 'name' => 'name', 'title' => _i("Name")],
        ];
    }
}
