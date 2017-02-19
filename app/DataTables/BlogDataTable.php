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
            ['data' => 'id', 'title' => __("ID")],
            ['data' => 'title', 'title' => __("Title")],
            ['data' => 'slug', 'title' => __("Slug")],
            ['data' => 'created_at', 'title' => __("Created")],
            ['data' => 'updated_at', 'title' => __("Updated")],
        ];
    }
}
