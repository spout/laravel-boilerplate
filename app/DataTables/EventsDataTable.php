<?php

namespace App\DataTables;

use App\Models\Event;

class EventsDataTable extends DataTable
{
    protected static $model = Event::class;
    protected static $resourcePrefix = 'admin.events';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'title', 'name' => 'title', 'title' => _i("Title")],
            ['data' => 'date_start', 'name' => 'date_start', 'title' => _i("Start date")],
            ['data' => 'date_end', 'name' => 'date_end', 'title' => _i("End date")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => _i("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => _i("Updated"), 'searchable' => false],
        ];
    }
}
