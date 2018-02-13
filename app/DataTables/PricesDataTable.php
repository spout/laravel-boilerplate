<?php

namespace App\DataTables;

use App\Models\Price;

class PricesDataTable extends DataTable
{
    protected static $model = Price::class;
    protected static $resourcePrefix = 'admin.prices';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [];
    }
}
