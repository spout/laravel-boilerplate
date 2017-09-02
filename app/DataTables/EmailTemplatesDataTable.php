<?php

namespace App\DataTables;

use App\Models\EmailTemplate;

class EmailTemplatesDataTable extends DataTable
{
    protected static $model = EmailTemplate::class;
    protected static $resourcePrefix = 'admin.email-templates';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'type', 'name' => 'type', 'title' => _i("Type"), 'searchable' => false],
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
        ];
    }
}
