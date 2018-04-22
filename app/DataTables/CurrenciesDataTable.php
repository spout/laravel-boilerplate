<?php

namespace App\DataTables;

class CurrenciesDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'code', 'name' => 'code', 'title' => _i("Code")],
            ['data' => 'name', 'name' => 'name', 'title' => _i("Name")],
            ['data' => 'symbol', 'name' => 'symbol', 'title' => _i("Symbol")],
        ];
    }
}
