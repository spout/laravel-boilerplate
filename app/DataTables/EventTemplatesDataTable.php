<?php

namespace App\DataTables;

use App\Models\EventTemplate;

class EventTemplatesDataTable extends DataTable
{
    protected static $model = EventTemplate::class;
    protected static $resourcePrefix = 'admin.event-templates';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
        ];
    }
}
