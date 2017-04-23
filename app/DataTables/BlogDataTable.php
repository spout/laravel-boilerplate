<?php

namespace App\DataTables;

use App\Models\Post;

class BlogDataTable extends DataTable
{
    protected static $model = Post::class;
    protected static $resourcePrefix = 'admin.blog';

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
            ['data' => 'created_at', 'name' => 'created_at', 'title' => __("Created"), 'searchable' => false],
            ['data' => 'updated_at', 'name' => 'updated_at', 'title' => __("Updated"), 'searchable' => false],
        ];
    }
}
