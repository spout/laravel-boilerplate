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
            ['data' => 'id', 'name' => 'id', 'title' => __("ID"), 'searchable' => false],
            ['data' => 'title', 'name' => 'title', 'title' => __("Title")],
            ['data' => 'slug', 'name' => 'slug', 'title' => __("Slug")],
            ['data' => 'path', 'name' => 'path', 'title' => __("Path")],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => __("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => __("Updated"), 'searchable' => false],
        ];
    }
}
