<?php

namespace App\DataTables;

class AmenitiesDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'name', 'name' => 'name', 'title' => _i("Name")],
        ];
    }
}
