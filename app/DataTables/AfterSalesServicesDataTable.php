<?php

namespace App\DataTables;

use App\Models\AfterSalesService;

class AfterSalesServicesDataTable extends DataTable
{
    protected static $model = AfterSalesService::class;
    protected static $resourcePrefix = 'admin.after-sales-services';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => _i("Updated"), 'searchable' => false],
        ];
    }
}
