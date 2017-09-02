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
            ['data' => 'id', 'name' => 'id', 'title' => _i("ID"), 'searchable' => false],
            ['data' => 'name', 'name' => 'name', 'title' => _i("Name")],
            //['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Created"), 'searchable' => false],
            //['data' => 'updated_at', 'name' => 'updated_at', 'title' => _i("Updated"), 'searchable' => false],
        ];
    }
}
