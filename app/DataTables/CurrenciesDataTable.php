<?php

namespace App\DataTables;

use App\Models\Currency;

class CurrenciesDataTable extends DataTable
{
    protected static $model = Currency::class;
    protected static $resourcePrefix = 'admin.currencies';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'code', 'name' => 'code', 'title' => _i("Code")],
            ['data' => 'name', 'name' => 'name', 'title' => _i("Name")],
            ['data' => 'symbol', 'name' => 'symbol', 'title' => _i("Symbol")],
        ];
    }
}
