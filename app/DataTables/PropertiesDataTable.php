<?php

namespace App\DataTables;

use App\Models\Property;

class PropertiesDataTable extends DataTable
{
    protected static $model = Property::class;
    protected static $resourcePrefix = 'admin.properties';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'name', 'name' => 'name', 'title' => _i("Name")],
        ];
    }
}
