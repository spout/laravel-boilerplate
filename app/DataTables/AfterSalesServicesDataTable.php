<?php

namespace App\DataTables;

use App\Models\AfterSalesService;

class AfterSalesServicesDataTable extends DataTable
{
    protected static $model = AfterSalesService::class;
    protected static $resourcePrefix = 'admin.after-sales-services';
    protected static $actionColumnActions = [
        //'show',
        'export' => 'admin.after-sales-services.includes.datatables.actions.export',
        'edit',
        'delete'
    ];

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'order_number', 'name' => 'order_number', 'title' => _i("Order number")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => _i("Updated"), 'searchable' => false],
        ];
    }
}
