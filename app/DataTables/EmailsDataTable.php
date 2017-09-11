<?php

namespace App\DataTables;

use App\Models\Email;

class EmailsDataTable extends DataTable
{
    protected static $model = Email::class;
    protected static $resourcePrefix = 'admin.emails';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'id', 'title' => _i("ID"), 'searchable' => false],
            //['data' => 'name', 'name' => 'name', 'title' => _i("Name")],
        ];
    }
}
