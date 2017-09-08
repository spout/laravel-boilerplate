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
            ['data' => 'event_type.title', 'name' => 'eventType.title', 'title' => _i("Type")],
        ];
    }

    public function query()
    {
        $model = static::$model;
        $query = $model::with('eventType')->select('event_templates.*');

        return $this->applyScopes($query);
    }
}
