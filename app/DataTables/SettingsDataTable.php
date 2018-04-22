<?php

namespace App\DataTables;

class SettingsDataTable extends DataTable
{
    protected function getColumns()
    {
        return [
            ['data' => 'key', 'name' => 'key', 'title' => _i("Key")],
        ];
    }
}
