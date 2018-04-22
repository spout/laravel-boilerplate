<?php

namespace App\DataTables;

class AddressBooksDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => _i("Id")],
        ];
    }
}
