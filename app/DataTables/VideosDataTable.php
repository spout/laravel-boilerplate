<?php

namespace App\DataTables;

class VideosDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => _i("Id"), 'searchable' => false],
            ['data' => 'url', 'name' => 'url', 'title' => _i("URL")],
        ];
    }
}
