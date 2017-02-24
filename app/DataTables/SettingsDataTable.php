<?php

namespace App\DataTables;

use App\Models\Setting;

class SettingsDataTable extends DataTable
{
    protected static $model = Setting::class;
    protected static $resourcePrefix = 'admin.settings';

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
