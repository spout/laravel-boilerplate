<?php

namespace App\DataTables;

class NeighborhoodsDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'name', 'name' => 'name', 'title' => _i("Name")],
        ];
    }
}
