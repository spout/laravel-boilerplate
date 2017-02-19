<?php

namespace App\DataTables;

use App\Models\Content;

class ContentsDataTable extends DataTable
{
    protected static $model = Content::class;
    protected static $resourcePrefix = 'admin.contents';

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'id', 'title' => __("ID")],
            ['data' => 'title', 'title' => __("Title")],
            ['data' => 'slug', 'title' => __("Slug")],
            ['data' => 'path', 'title' => __("Path")],
            ['data' => 'created_at', 'title' => __("Created")],
            ['data' => 'updated_at', 'title' => __("Updated")],
        ];
    }
}
