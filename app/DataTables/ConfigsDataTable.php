<?php

namespace App\DataTables;

use App\Models\Config;

class ConfigsDataTable extends DataTable
{
    protected static $model = Config::class;
    protected static $resourcePrefix = 'admin.configs';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'key', 'title' => __("Key")],
        ];
    }
}
